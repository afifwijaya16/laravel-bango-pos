 @push('js')
     <script>
         @if (session('status'))
             Swal.fire({
                 icon: 'success',
                 title: '{{ session('status') }}',
             })
         @endif
         @if (session('errorValidation'))
             Swal.fire({
                 icon: 'error',
                 html: '<ul class="list-unstyled">' +
                     '@foreach ($errors->all() as $error)' +
                     '<li>{{ $error }}</li>' +
                     '@endforeach' +
                     '</ul>',
                 title: '{{ session('errorValidation') }}',
             })
         @endif

         document.addEventListener('click', function(event) {
             const dropdowns = document.querySelectorAll('details');
             dropdowns.forEach(dropdown => {
                 if (!dropdown.contains(event.target)) {
                     dropdown.removeAttribute('open');
                 }
             });
         });

         $("#button_modalAdd").click(function(e) {
             e.preventDefault();
             var url = "{{ route('product.create') }}";
             $.get(url, function(data) {
                 $('#place-modal').html(data.html);
                 openModal('modal-add');
             }).done(function(data) {
                 $('#loading').hide();
             });
         });

         function editFunctionData($id) {
             event.preventDefault();
             var url = "{{ route('product.show', ':id_data') }}";
             url = url.replace(":id_data", $id);
             $.get(url, function(data) {
                 $('#place-modal').html(data.html);
                 openModal('modal-edit');
             }).done(function(data) {
                 $('#loading').hide();
             });
         }

         function deleteFunction(id, event) {
             event.preventDefault();
             const formId = 'form-delete-' + id;

             Swal.fire({
                 title: 'Are you sure you want to delete this data?',
                 icon: 'warning',
                 showCancelButton: true,
                 confirmButtonColor: '#3085d6',
                 cancelButtonColor: '#d33',
                 confirmButtonText: 'Yes',
                 cancelButtonText: 'No'
             }).then((result) => {
                 if (result.isConfirmed) {
                     document.getElementById(formId).submit();
                 }
             }).catch((error) => {
                 console.log(error);
             });

             return false;
         }

         function openModal(id) {
             document.getElementById(id).classList.remove('hidden');
         }

         function closeModal(id) {
             document.getElementById(id).classList.add('hidden');
         }
     </script>
 @endpush
