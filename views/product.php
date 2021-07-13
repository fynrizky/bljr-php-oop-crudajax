<?php 
    include_once "models/m_products.php";
    $products = new Products($connection);
?>

<div class="row mt-4">
<div class="col-lg">

<div class="container">
        <div class="row">
            <h1>Product</h1>
        </div>
        <div class="card">
            <div class="card-header">
                <h5>
                    <i class="fas fa-archive"></i> 
                    Product
                    <button type="button" class="btn btn-success float-end" data-bs-toggle="modal" data-bs-target="#add-modal"><span class="fas fa-paper-plane"></span> Add</button>
                    <button class="btn btn-secondary btn-light float-end"><span class="fas fa-save"></span> Print</button>
                </h5>
            </div>  
            <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped display table-products" id="dataTable">
                    <thead class="table-primary">
                        <tr>
                            <th>No</th>
                            <th>Product</th>
                            <th>Stock</th>
                            <th>Price</th>
                            <th>Pict</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php 

                            $data = $products->show();
                            foreach($data as $index => $dat):
                                ?>
                        <tr>
                            <td><?= $index + 1; ?></td>
                            <td><?= $dat['product']; ?></td>
                            <td><?= $dat['stock']; ?></td>
                            <td><?= $dat['price']; ?></td>
                            <td>
                                <img src="../assets/img/<?= $dat['picture']; ?>" width="100" alt="pict_product">
                            </td>
                            <td>
                                <button type="button" id="update-product" data-bs-toggle="modal" data-bs-target="#update-modal"
                                data-id="<?= $dat['id']; ?>" data-product="<?=$dat['product'];?>" data-stock="<?=$dat['stock'];?>" 
                                data-price="<?=$dat['price'];?>" data-picture="<?= $dat['picture']; ?>" class="btn btn-warning btn-sm"><span class="fas fa-pencil-alt"></span></button>
                                <button type="button" id="delete-product" data-id="<?= $_SESSION['idproduct'] = $dat['id']; ?>" data-product="<?= $_SESSION['product'] = $dat['product']; ?>" data-bs-toggle="modal" data-bs-target="#delete-modal" class="btn btn-danger btn-sm"><span class="fas fa-trash"></span></button>
                            </td>
                        </tr>
                        <?php 
                            endforeach;
                            ?>
                    </tbody>
                </table>
            </div>
            </div>
        </div>
</div>

</div>
</div>

<?php include_once "views/action/addproduct.php"; ?>
<?php include_once "views/action/updateproduct.php"; ?>
<?php include_once "views/action/deleteproduct.php"; ?>