<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

</script>
<script>
        $(document).ready(function () {
                $(document).on('click','.add_product',function (e) {
                    e.preventDefault();
                    let name = $('#name').val()
                    let price = $('#price').val()

                   $.ajax({
                        url:"api/add-product",
                        method:'post',
                        data:{name:name,price:price},
                        success:function (res) {
                            if (res.status == 'success'){
                               $('.errMsgContainer').empty();
                                $('#addModal').modal('hide')
                                $('#addForm')[0].reset();
                                $('.table').load(location.href+' .table');
                                Command: toastr["success"]("Product Added", "Successfully")

                                toastr.options = {
                                    "closeButton": false,
                                    "debug": false,
                                    "newestOnTop": false,
                                    "progressBar": false,
                                    "positionClass": "toast-top-right",
                                    "preventDuplicates": false,
                                    "onclick": null,
                                    "showDuration": "300",
                                    "hideDuration": "1000",
                                    "timeOut": "3000",
                                    "extendedTimeOut": "1000",
                                    "showEasing": "swing",
                                    "hideEasing": "linear",
                                    "showMethod": "fadeIn",
                                    "hideMethod": "fadeOut"
                                }

                            }
                        },error:function (err) {
                            let error = err.responseJSON;
                            $.each(error.errors,function (index, value) {
                                    $('.errMsgContainer').append('<span class="text-danger">'+value+'</span>'+'<br>')
                            })

                        }
                     })
                })



            $(document).on('click','.updateProduct',function (e) {
                    e.preventDefault();
                    let id = $(this).data('id')
                    let name = $(this).data('name')
                    let price = $(this).data('price')

                    $('#up_id').val(id)
                    $('#up_name').val(name)
                    $('#up_price').val(price)
            })




            $(document).on('click','.update_product', function (e) {
                    e.preventDefault();
                    let up_id = $('#up_id').val();
                    let up_name = $('#up_name').val();
                    let up_price = $('#up_price').val();

                    $.ajax({
                        url:"api/update-product",
                        method:'post',
                        data:{up_id:up_id,up_name:up_name,up_price:up_price},
                        success:function (res) {
                            if(res.status=='success'){
                                $('.errMsgContainer').empty();
                                $('#updateModal').modal('hide');
                                $('#updateForm')[0].reset()
                                $('.table').load(location.href+' .table');
                                Command: toastr["info"]("Product Updated", "Successfully")

                                toastr.options = {
                                    "closeButton": false,
                                    "debug": false,
                                    "newestOnTop": false,
                                    "progressBar": false,
                                    "positionClass": "toast-top-right",
                                    "preventDuplicates": false,
                                    "onclick": null,
                                    "showDuration": "300",
                                    "hideDuration": "1000",
                                    "timeOut": "3000",
                                    "extendedTimeOut": "1000",
                                    "showEasing": "swing",
                                    "hideEasing": "linear",
                                    "showMethod": "fadeIn",
                                    "hideMethod": "fadeOut"
                                }
                            }
                        },error:function (err) {
                            let error = err.responseJSON;
                            $.each(error.errors,function (index,value) {
                                $('.errMsgContainer').append('<span class="text-danger">'+value+'</span><br>')

                            })
                        }
                    })
            })



        $(document).on('click','.delete-product',function (e) {

            let product_id = $(this).data('id')

            $(document).on('click','.delete_product',function () {
                $.ajax({
                    url:"api/delete-product",
                    method:'post',
                    data:{product_id:product_id},
                    success:function (res) {
                        if(res.status=='success'){
                            $('#deleteModal').modal('hide')
                            $('.table').load(location.href+' .table');
                            Command: toastr["error"]("Product Deleted", "Successfully")

                            toastr.options = {
                                "closeButton": false,
                                "debug": false,
                                "newestOnTop": false,
                                "progressBar": false,
                                "positionClass": "toast-top-right",
                                "preventDuplicates": false,
                                "onclick": null,
                                "showDuration": "300",
                                "hideDuration": "1000",
                                "timeOut": "3000",
                                "extendedTimeOut": "1000",
                                "showEasing": "swing",
                                "hideEasing": "linear",
                                "showMethod": "fadeIn",
                                "hideMethod": "fadeOut"
                            }
                        }

                    }
                })
            })


        })



        $(document).on('click','.pagination a', function (e) {
                e.preventDefault();
                let page = $(this).attr('href').split('page=')[1];
                products(page)
        })
            function products(page) {
                    $.ajax({
                        url:"api/pagination/paginate-data?page="+page,
                        success:function (res) {
                            $('.table-data').html(res)
                        }
                    })
            }


            $(document).on('keyup',function (e) {
                e.preventDefault();
                let search_string = $('#search').val()

                $.ajax({
                    url:"api/search",
                    method:'get',
                    data:{search_string:search_string},
                    success:function (res) {
                        $('.table-data').html(res);
                        if(res.status=='nothing_found'){
                            $('.table-data').html('<span class="text-danger">'+'Nothing Found'+'</span>');
                        }

                    }
                })

            })
        })
</script>
