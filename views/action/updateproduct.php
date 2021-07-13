
<!-- Modal -->
<div class="modal fade" id="update-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="modal-update">
            <form action="" method="post" class="form_update_product" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="product">Product</label>
                        <input type="hidden" id="idproduct" name="idproduct">
                        <input type="text" id="product" name="product" class="form-control" placeholder="Product">
                    </div>
                    <div class="form-group">
                        <label for="stock">Stock</label>
                        <input type="number" id="stock" name="stock" class="form-control" placeholder="stock">
                    </div>
                    <div class="form-group">
                        <label for="stock">Price</label>
                        <input type="number" id="price" name="price" class="form-control" placeholder="price">
                    </div>
                    <div class="form-group">
                        <label for="pict">Picture</label>
                        <input type="file" id="pict" name="pict" class="form-control" placeholder="Pict">
                        <img src="" id="pict-last" width="100%" style="padding-top: 8px;" alt="pict_last">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary btn-update">
                    <div class="hide-buffering"><span class="fas fa-paper-plane"></span> Update</div>
                    <div class="buffering"></div>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $(document).on('click', '#update-product', function(){
        const id = $(this).data('id');
        const product = $(this).data('product');
        const stock = $(this).data('stock');
        const price = $(this).data('price');
        const pict = $(this).data('picture');

        $('#modal-update #idproduct').val(id);
        $('#modal-update #product').val(product);
        $('#modal-update #stock').val(stock);
        $('#modal-update #price').val(price);
        $('#modal-update #pict-last').attr('src', '../../assets/img/'+pict);
    });

    $('.form_update_product').on('submit', function(e){
        e.preventDefault();

        const id = $('#modal-update #idproduct').val();
       
        $('.btn-update').attr('disabled', true);
        $('.hide-buffering').hide();
        const span = "<span class='spinner-border spinner-border-sm' role='status' aria-hidden='true'></span>"+' Loading...';
        $('.buffering').append(span);
        
        $.ajax({
            type: 'POST',
            data: new FormData(this),
            url : 'views/actionprocess/ajax-update-product.php?id='+id,
            contentType: false,
            cache: false,
            processData: false,
            success: function(msg){
                
                setTimeout(function(){
                    messege(msg);
                },25000/2);

                setTimeout(function(){
                    $('#update-modal').modal('hide');
                    Swal.fire({
                        position: 'top-center',
                        icon: 'success',
                        title: 'Success Update Data !!',
                        showConfirmButton: false,
                        timer: 5000
                    });
                },5000/2);

                setTimeout(function(){
                    window.location.href = '?hal=product';
                },10000/2);

                function messege(msg){
                    $('.card-body').html(msg);
                    $('#update-modal').modal('show');
                }
            }
        });
    });
    

</script>