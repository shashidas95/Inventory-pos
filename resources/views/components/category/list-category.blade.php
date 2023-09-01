<div class="container">
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="card animated fadeIn w-100 p-3">
                <div class="card-body">

                    <div class="col-md-12">
                        <h4>List Category
                            <button type="button" class="btn btn-sm float-end btn-primary" data-bs-toggle="modal"
                                data-bs-target="#createModal"> create Category</button>
                        </h4>
                        <hr>
                    </div>

                    <div class="container-fluid m-0 p-0">
                        <div class="row m-0 p-0">

                            <table class="table" id="tableData">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Category</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="tableList">

                                </tbody>
                            </table>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    getList()
    async function getList() {

        showLoader()
        let res = await axios.get('/list-category');
        hideLoader()

        let tableList = $('#tableList')
        let tableData = $('#tableData')

        tableData.DataTable().destroy()
        tableList.empty()

        res.data.forEach((item, index) => {
            let row = `<tr>
                            <td scope="row">${ index + 1 }</td>
                            <td>${ item['name'] }</td>
                            <td>
                             <button data-id ="${item['id']}" class=" btn EditBtn btn-sm btn-outline-success" href="">Edit</button>
                            <button data-id ="${item['id']}" class="btn deleteBtn btn-sm btn-outline-warning" href="">Delete</button>
                             </td>
                    </tr>`
            tableList.append(row);
        });
        /*let table = new DataTable('#tableData',{
            order: [
                [0, 'desc']
            ],
            lengthMenu: [5, 10, 15, 20]
        } );

        */
        tableData.DataTable({
            order: [
                [0, 'desc']
            ],
            lengthMenu: [5, 10, 15, 20]
        })

        $('.EditBtn').on('click', async function() {
            let id = $(this).data('id')
            await FillupUpdateForm(id)
            $('#updateModal').modal('show')
        })

        $('.deleteBtn').on('click', function() {
            let id = $(this).data('id')
            $('#deleteModal').modal('show')
            $('#deleteID').val(id)
        })

    }
</script>
