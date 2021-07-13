<!-- Modal -->
<div class="modal fade" id="delete-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form class="form-delete-product" enctype="multipart/form-data">
                <div class="modal-body" id="modal-delete">
                    <div class="form-group">
                        <input type="hidden" id="id" name="id" class="form-control">
                        <input type="hidden" id="product" name="product" class="form-control">
                        <div class="alert-delete" style="font-weight: bold;">Yakin Di Hapus Data ?</div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary deleteproduct">
                    <div id="hide-buffering-delete"><span class="fas fa-paper-plane"></span> Delete</div>
                    <div id="buffering-delete"></div>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>


<script>
    $(document).on('click','#delete-product', function(){
        
        const idproduct = $(this).data('id');
        const product = $(this).data('product');
        $('#modal-delete #id').val(idproduct);
        $('#modal-delete #product').val(product);
        
        // $('.alert-delete').append('Yakin Di Hapus Data '+$('#modal-delete #product').val()+' ?');
    });
    

    $('.form-delete-product').on('submit', function(e){
        e.preventDefault();
        
        const id = $('#modal-delete #id').val();
        const notice = confirm ('Hapus Data '+$('#modal-delete #product').val()+' !!');
        
        if(notice == true)
        {
        
        $('.deleteproduct').attr('disabled', true);
        $('#hide-buffering-delete').hide();
        let span = "<span class='spinner-border spinner-border-sm' role='status' aria-hidden='true'></span>"+' Loading...';
        $('#buffering-delete').append(span);
            $.ajax({
                type: 'GET',
                url :'views/actionprocess/ajax-delete-product.php?id='+id,
                success: function(msg){
                
                setTimeout(function(){
                    message(msg);    
                },25000/2);

                setTimeout(function(){
                    $('#delete-modal').modal('hide');
                    Swal.fire({
                        position: 'top-center',
                        icon: 'success',
                        title: 'Success Delete Data !!',
                        showConfirmButton: false,
                        timer: 5000
                    });
                },5000/2);
                setTimeout(function(){
                    window.location.reload();
                },10000/2);

                    function message(msg){
                    $('.card-body').html(msg);
                    $('#delete-modal').modal('show');
                }
                }
            });
        }
        
    });
    
    
</script>