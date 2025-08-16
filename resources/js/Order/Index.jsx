import React, { useState, useMemo, useEffect } from "react";
import Swal from "sweetalert2";
import axios from "axios";

export default function OrderPage() {
    const formatRupiah = (number) => {
        return new Intl.NumberFormat("id-ID", {
            style: "currency",
            currency: "IDR",
            minimumFractionDigits: 0,
        }).format(number);
    };

    const [products, setProducts] = useState([]);
    const [categories, setCategories] = useState([]);
    const [order, setOrder] = useState([]);
    const [searchInput, setSearchInput] = useState(""); // isi input
    const [searchTerm, setSearchTerm] = useState(""); // query aktif
    const [activeCategory, setActiveCategory] = useState("All Product");
    const [filteredProducts, setFilteredProducts] = useState(products);
    const [loading, setLoading] = useState(false);
    const [error, setError] = useState(null);

    useEffect(() => {
        const fetchData = async () => {
            try {
                setLoading(true);
                const categoriesResponse = await axios.get(
                    "http://127.0.0.1:8000/api/category"
                );
                if (!categoriesResponse.data.success)
                    throw new Error("Failed to load categories");
                const productsResponse = await axios.get(
                    "http://127.0.0.1:8000/api/product"
                );
                if (!productsResponse.data.success)
                    throw new Error("Failed to load products");
                setCategories([
                    "All Product",
                    ...categoriesResponse.data.data.map((item) => item.name),
                ]);
                setProducts(productsResponse.data.data);
            } catch (err) {
                setError(err.message);
            } finally {
                setLoading(false);
            }
        };

        fetchData();
    }, []);

    const handleAddToOrder = (product) => {
        setOrder((currentOrder) => {
            const existingItem = currentOrder.find(
                (item) => item.id === product.id
            );
            if (existingItem) {
                return currentOrder.map((item) =>
                    item.id === product.id
                        ? { ...item, quantity: item.quantity + 1 }
                        : item
                );
            }
            return [...currentOrder, { ...product, quantity: 1, notes: "" }];
        });
    };

    const handleUpdateQuantity = (productId, change) => {
        setOrder((currentOrder) => {
            const itemToUpdate = currentOrder.find(
                (item) => item.id === productId
            );
            if (itemToUpdate.quantity + change <= 0) {
                return currentOrder.filter((item) => item.id !== productId);
            }
            return currentOrder.map((item) =>
                item.id === productId
                    ? { ...item, quantity: item.quantity + change }
                    : item
            );
        });
    };

    const handleDeleteItem = (productId) => {
        setOrder((currentOrder) =>
            currentOrder.filter((item) => item.id !== productId)
        );
    };

    const handleUpdateNotes = (productId, notes) => {
        setOrder((currentOrder) =>
            currentOrder.map((item) =>
                item.id === productId ? { ...item, notes: notes } : item
            )
        );
    };

    const handleResetOrder = () => {
        if (order.length === 0) {
            Swal.fire("Order is already empty!");
            return;
        }

        Swal.fire({
            title: "Reset Order?",
            text: "This will clear all items from the current order.",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#d33",
            cancelButtonColor: "#3085d6",
            confirmButtonText: "Yes, reset it!",
        }).then((result) => {
            if (result.isConfirmed) {
                setOrder([]);
                Swal.fire("Reset!", "Your order has been cleared.", "success");
            }
        });
    };

    const handleSearchClick = () => {
        setSearchTerm(searchInput);
    };

    useEffect(() => {
        setLoading(true);

        const timeout = setTimeout(() => {
            const result = products.filter((product) => {
                const matchesCategory =
                    activeCategory === "All Product" ||
                    product.category === activeCategory;
                const matchesSearch = product.name
                    .toLowerCase()
                    .includes(searchTerm.toLowerCase());
                return matchesCategory && matchesSearch;
            });

            setFilteredProducts(result);
            setLoading(false);
        }, 300);

        return () => clearTimeout(timeout);
    }, [products, activeCategory, searchTerm]);

    const { subtotal, serviceCharge, tax, totalPayment } = useMemo(() => {
        const subtotal = order.reduce(
            (acc, item) => acc + item.sale_price * item.quantity,
            0
        );
        const serviceCharge = subtotal * 0.05;
        const tax = subtotal * 0.1;
        const totalPayment = subtotal + serviceCharge + tax;
        return { subtotal, serviceCharge, tax, totalPayment };
    }, [order]);

    // --- Render Logic (JSX) ---
    return (
        <main className="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100 p-2 main-content">
            <div className="grid grid-cols-12 gap-6 grid-container">
                {/* Product List Section */}
                <div className="col-span-12 lg:col-span-8 relative">
                    <div className="sticky top-0 bg-gray-100 pt-1 pb-4 z-10 overflow-hidden">
                        <div className="flex justify-between items-center mb-2">
                            <h2 className="text-lg font-bold text-gray-800">
                                List Product
                            </h2>
                            <div className="flex items-center space-x-2">
                                <div className="relative">
                                    <input
                                        type="text"
                                        placeholder="Search product"
                                        className="pl-10 pr-4 py-2 border-white bg-white focus:border-white focus:ring-white rounded-lg w-full md:w-64"
                                        value={searchInput}
                                        onChange={(e) =>
                                            setSearchInput(e.target.value)
                                        }
                                    />
                                    <i className="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                                </div>
                                <button
                                    onClick={handleSearchClick}
                                    className="flex items-center px-4 py-2 border bg-white rounded-lg"
                                >
                                    <i className="fas fa-filter mr-2 text-gray-400"></i>
                                    Filter
                                </button>
                            </div>
                        </div>
                        <div className="flex space-x-2 border-b bg-white p-2 rounded-md">
                            {categories.map((category) => (
                                <button
                                    key={category}
                                    onClick={() => setActiveCategory(category)}
                                    className={`px-4 py-2 rounded-full ${
                                        activeCategory === category
                                            ? "text-white bg-emerald-600"
                                            : "text-gray-500"
                                    }`}
                                >
                                    {category}
                                </button>
                            ))}
                        </div>
                    </div>

                    <div className="h-[calc(100vh-240px)] overflow-y-auto mt-2">
                        {loading ? (
                            // Loading state
                            <div className="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-6">
                                {[...Array(6)].map((_, index) => (
                                    <div
                                        key={index}
                                        className="bg-white rounded-lg shadow p-4 flex flex-col animate-pulse"
                                    >
                                        <div className="w-full h-32 bg-gray-200 rounded-lg mb-4"></div>
                                        <div className="h-4 bg-gray-200 rounded w-3/4 mb-2"></div>
                                        <div className="h-4 bg-gray-200 rounded w-1/2 mb-4"></div>
                                        <div className="flex justify-between">
                                            <div className="h-4 bg-gray-200 rounded w-12"></div>
                                            <div className="h-4 bg-gray-200 rounded w-16"></div>
                                        </div>
                                        <div className="mt-4 h-10 bg-gray-200 rounded-lg"></div>
                                    </div>
                                ))}
                            </div>
                        ) : filteredProducts.length === 0 ? (
                            // No product found
                            <div className="flex justify-center items-center py-10">
                                <p className="text-gray-500 font-semibold">
                                    🚫 No products found
                                </p>
                            </div>
                        ) : (
                            // Product grid
                            <div className="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-6">
                                {filteredProducts.map((product) => (
                                    <div
                                        key={product.id}
                                        className="bg-white rounded-lg shadow p-4 flex flex-col justify-between"
                                    >
                                        <div>
                                            <img
                                                src={
                                                    product.image_path
                                                        ? `http://127.0.0.1:8000${product.image_path}`
                                                        : "no-image.jpg"
                                                }
                                                alt={product.name}
                                                className="w-full h-32 object-cover rounded-lg mb-4"
                                            />
                                            <h3 className="font-bold text-gray-500">
                                                {product.name}
                                            </h3>
                                            <p className="text-gray-800 font-bold mb-2">
                                                {formatRupiah(
                                                    product.sale_price
                                                )}
                                            </p>
                                            <div className="flex justify-between">
                                                <p className="text-sm font-semibold">
                                                    Stock
                                                </p>
                                                <p className="text-sm text-green-600 font-semibold bg-emerald-100 p-1 rounded-lg">
                                                    {product.stock} Product
                                                </p>
                                            </div>
                                        </div>
                                        <button
                                            onClick={() =>
                                                handleAddToOrder(product)
                                            }
                                            className="mt-4 w-full border border-emerald-500 text-emerald-600 py-2 rounded-lg font-semibold hover:bg-emerald-200 transition-colors"
                                        >
                                            <i className="fas fa-plus mr-2 bg-emerald-500 p-1 rounded-full text-white"></i>{" "}
                                            Add
                                        </button>
                                    </div>
                                ))}
                            </div>
                        )}
                    </div>
                </div>

                {/* Order Section */}
                <div className="col-span-12 lg:col-span-4">
                    <div className="bg-white rounded-lg shadow p-6 sticky top-0">
                        <div className="flex justify-between items-center mb-4">
                            <h3 className="text-lg font-bold text-gray-800">
                                <i className="fa-solid fa-clipboard-list"></i>{" "}
                                Order #00001
                            </h3>
                            <button
                                onClick={handleResetOrder}
                                className="text-red-500 font-semibold text-sm"
                            >
                                <i className="fas fa-repeat mr-1"></i>Reset
                                Order
                            </button>
                        </div>
                        <div className="flex mb-4 gap-2">
                            <input
                                type="radio"
                                name="orderType"
                                id="dineIn"
                                className="hidden peer/dinein"
                                defaultChecked
                            />
                            <label
                                htmlFor="dineIn"
                                className="w-full p-2 text-center bg-emerald-100 text-emerald-500 border border-emerald-500 rounded-lg font-semibold cursor-pointer peer-checked/dinein:bg-emerald-600 peer-checked/dinein:text-white peer-checked/dinein:border-none"
                            >
                                Dine In
                            </label>
                            <input
                                type="radio"
                                name="orderType"
                                id="takeAway"
                                className="hidden peer/takeaway"
                            />
                            <label
                                htmlFor="takeAway"
                                className="w-full p-2 text-center bg-emerald-100 text-emerald-500 border border-emerald-500 rounded-lg font-semibold cursor-pointer peer-checked/takeaway:bg-emerald-600 peer-checked/takeaway:text-white peer-checked/takeaway:border-none"
                            >
                                Take Away
                            </label>
                        </div>
                        <div
                            className={`space-y-4 mb-4 pr-2 h-[calc(100vh-470px)] overflow-y-auto ${
                                order.length === 0
                                    ? "flex items-center justify-center"
                                    : ""
                            }`}
                        >
                            {order.length === 0 ? (
                                <div className="flex flex-col items-center text-center py-8">
                                    <img
                                        src="/no-order.png"
                                        alt="no order"
                                        className="w-32 h-32"
                                    />
                                    <p className="text-gray-500">
                                        Your Order is Empty
                                    </p>
                                    <p className="text-sm text-gray-400">
                                        You haven’t added any items yet.
                                    </p>
                                </div>
                            ) : (
                                order.map((item) => (
                                    <div
                                        key={item.id}
                                        className="flex flex-col"
                                    >
                                        <div className="flex justify-between">
                                            <p className="font-semibold text-gray-800 text-sm">
                                                {item.name}
                                            </p>
                                            <p className="font-bold text-gray-800 text-sm mb-2">
                                                {formatRupiah(
                                                    item.sale_price *
                                                        item.quantity
                                                )}
                                            </p>
                                        </div>
                                        <div className="relative">
                                            <input
                                                type="text"
                                                placeholder="Catatan..."
                                                value={item.notes}
                                                className="pr-10 py-2 bg-slate-100 border-white focus:border-white focus:ring-white rounded-lg w-full text-sm"
                                                onChange={(e) =>
                                                    handleUpdateNotes(
                                                        item.id,
                                                        e.target.value
                                                    )
                                                }
                                            />
                                            <i className="fas fa-pencil absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                                        </div>
                                        <div className="flex justify-between items-center mt-2">
                                            <button
                                                onClick={() =>
                                                    handleDeleteItem(item.id)
                                                }
                                                className="w-8 h-8 text-white p-2 rounded-full text-sm font-bold flex items-center justify-center"
                                            >
                                                <i className="fa fa-trash text-red-500 hover:text-red-600"></i>
                                            </button>
                                            <div className="flex items-center border rounded-full p-1">
                                                <button
                                                    onClick={() =>
                                                        handleUpdateQuantity(
                                                            item.id,
                                                            -1
                                                        )
                                                    }
                                                    className="w-8 h-8 bg-emerald-500 hover:bg-emerald-600 text-white rounded-full text-sm font-bold flex items-center justify-center"
                                                >
                                                    -
                                                </button>
                                                <span className="mx-2 font-semibold text-sm w-4 text-center">
                                                    {item.quantity}
                                                </span>
                                                <button
                                                    onClick={() =>
                                                        handleUpdateQuantity(
                                                            item.id,
                                                            1
                                                        )
                                                    }
                                                    className="w-8 h-8 bg-emerald-500 hover:bg-emerald-600 text-white rounded-full text-sm font-bold flex items-center justify-center"
                                                >
                                                    +
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                ))
                            )}
                        </div>
                        <div className="border-t pt-4">
                            <div className="space-y-2 text-sm">
                                <div className="flex justify-between">
                                    <p className="text-gray-600">Subtotal</p>
                                    <p className="font-semibold text-gray-800">
                                        {formatRupiah(subtotal)}
                                    </p>
                                </div>
                                <div className="flex justify-between">
                                    <p className="text-gray-600">
                                        Service Charge 5%
                                    </p>
                                    <p className="font-semibold text-gray-800">
                                        {formatRupiah(serviceCharge)}
                                    </p>
                                </div>
                                <div className="flex justify-between">
                                    <p className="text-gray-600">PBT 10%</p>
                                    <p className="font-semibold text-gray-800">
                                        {formatRupiah(tax)}
                                    </p>
                                </div>
                            </div>
                            <div className="flex justify-between items-center mt-4 pt-4 border-t">
                                <p className="font-bold text-lg text-gray-800">
                                    Total Payment
                                </p>
                                <p className="font-bold text-lg text-emerald-600">
                                    {formatRupiah(totalPayment)}
                                </p>
                            </div>
                            <button
                                className="w-full bg-emerald-600 hover:bg-emerald-700 text-white py-3 rounded-lg mt-4 font-bold text-base disabled:bg-gray-300 disabled:cursor-not-allowed"
                                disabled={order.length === 0}
                            >
                                Continue Payment{" "}
                                <i className="fas fa-arrow-right ml-2"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    );
}
