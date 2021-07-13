<!-- Modal -->

<div class="modal fade" id="add-modal" tabindex="-1" aria-labelledby="addProductModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel"> Add Products</h5>
            </div>
            <form action="" class="form-add-product" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="product">Product</label>
                        <input type="text" name="product" id="product" class="form-control" placeholder="Product Name" required>
                    </div>
                    <div class="form-group">
                        <label for="stock">Stock</label>
                        <input type="number" name="stock" id="stock" class="form-control" placeholder="Stock" required>
                    </div>
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="number" name="price" id="price" class="form-control" placeholder="Price" required>
                    </div>
                    <div class="form-group">
                        <label for="pict">Upload Picture</label>
                        <input type="file" name="pict" id="pict" class="form-control" placeholder="Picture">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="add-product">
                    <div id="hide-buffering"><span class="fas fa-paper-plane"></span> Add</div>
                    <div id="buffering"></div>
                    </button>
                
                </div>
            </form>
        </div>
    </div>
</div>


 <!-- Create Data -->
 <script>
$(".form-add-product").on("submit", function(e){
    e.preventDefault();
                
        $('#add-product').attr('disabled', true);
        $('#hide-buffering').hide();
        let span = "<span class='spinner-border spinner-border-sm' role='status' aria-hidden='true'></span>"+' Loading...';
        $('#buffering').append(span);

            $.ajax({
            url : 'views/actionprocess/ajax-add-product.php',
            type: 'POST',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function (msg) {
                setTimeout(function(){
                    message(msg);    
                },25000/2);

                setTimeout(function(){
                    $('#add-modal').modal('hide');
                    Swal.fire({
                        position: 'top-center',
                        icon: 'success',
                        title: 'Success Add Data !!',
                        showConfirmButton: false,
                        timer: 5000
                    });
                },5000/2);

                setTimeout(function(){
                    window.location.href = '?hal=product';
                },10000/2);
                
                function message(msg){
                    $('.card-body').html(msg);
                    $('#add-modal').modal('show');
                }
            }
        });    
    
});
</script>