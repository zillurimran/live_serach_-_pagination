<div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
    <form action="" method="post" id="updateForm">
        @csrf
        <input type="hidden" id="up_id">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateModalLabel">Update Product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="errMsgContainer my-2" id="errMsgContainer"></div>
                    <div class="form-group">
                        <label for="name">Product Name</label>
                        <input type="text" name="up_name" id="up_name" class="form-control" placeholder="Product name">
                    </div>

                    <div class="form-group mt-2">
                        <label for="price">Product Price</label>
                        <input type="text" name="up_price" id="up_price" class="form-control" placeholder="Product Price">
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary update_product">Update Product</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
