<!-- /.card-header -->
<div class="card-header">
    <h2 class="card-title">Product list</h2>
</div>
<div class="card-body">
    <div class="row">  
        <div class="col-sm-12 col-md-6">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-lg"><i class="fa-solid fa-plus"></i> Add Product</button>
        </div>
        <div class="col-sm-12 col-md-6">
            <a class="float-right" style="color:black; margin-right: 5px;" href="?controller=dashboard&table=trash" title="Trash" type="button">
                <i class="fa-solid fa-trash "></i>
            </a>  
        </div>
    </div>
   <table id="tableProduct" class="table table-bordered table-striped">
   <thead>
   <tr>
       <th>ID</th>
       <th>Product Name</th>
       <th>Product Image</th>
       <th>Product Price</th>
       <th>Product Category</th>
       <th>Action</th>
   </tr>
   </thead>
   
   <tfoot>
   <tr>
       <th>ID</th>
       <th>Product Name</th>
       <th>Product Image</th>
       <th>Product Price</th>
       <th>Product Category</th>
       <th>Action</th>
   </tr>
   </tfoot>
   </table>
</div>

<div class="modal fade" id="modal-lg" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Add Product</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <form method="post" action='?controller=dashboard&action=add' enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="inputNameProduct">Product Name</label>
                            <input type="text" id="inputNameProduct" name="name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="uploadImage">Product Image</label>
                            <input type="file" id="uploadImage" name="image" class="form-control-file" required>
                        </div>
                       <div class="form-group">
                            <label for="selectCategory">Category</label>
                            <select id="selectCategory" name="category_id" class="form-control custom-select" required>
                                <option selected disabled>Category</option>
                                <option value="1">Shirt</option>
                                <option value="2">Pants</option>
                                <option value="3">Shose</option>
                                <option value="4">Accessory</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="inputPriceProduct">Price</label>
                            <input type="number" id="inputPriceProduct" name="price" class="form-control" min='1' required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <input type="submit" value="Add new Product" class="btn btn-success float-right">
                </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>