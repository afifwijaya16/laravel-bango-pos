import "./bootstrap";
import React from "react";
import ReactDOM from "react-dom/client";
import OrderPage from "./Order/Index"; // We will create this component next
import "../css/app.css";
import { DataTable } from "simple-datatables";

// Find the root element
const container = document.getElementById("app");

if (container) {
    // Create a root and render the React component
    const root = ReactDOM.createRoot(container);
    root.render(
        <React.StrictMode>
            <OrderPage />
        </React.StrictMode>
    );
}

document.addEventListener("DOMContentLoaded", function () {
    const dataTable = document.getElementById("myTable");
    if (dataTable) {
        new DataTable(dataTable);
    }
});
