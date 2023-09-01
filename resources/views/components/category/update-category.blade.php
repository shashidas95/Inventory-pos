<!-- Modal -->
<div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Update Category * </h1>
                <button type="button" class="btn-close btn-primary btn" data-bs-dismiss="modal" aria-label="Close">
                    &times;</button>
            </div>
            <div class="modal-body">
                <form id="update-form">
                    <div class="mb-3">
                        <label for="categoryNameForUpdate" class="form-label">Category Name </label>
                        <input type="text" class="form-control" id="categoryNameForUpdate">
                        <input class="d-none" id="updateID" />
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button id="update-modal-close" type="button" class="btn btn-secondary"
                    data-bs-dismiss="modal">Close</button>
                <button onclick="Update()" id="update-btn" type="button" class="btn btn-primary">Update</button>
            </div>
        </div>
    </div>
</div>
<script>
    async function FillupUpdateForm(id) {
        document.getElementById('updateID').value = id
        showLoader()
        let res = await axios.post('category-by-id', {
            id: id
        })
        hideLoader()
        document.getElementById('categoryNameForUpdate').value = res.data['name']

    }
    async function Update() {
        let categoryNameForUpdate = document.getElementById('categoryNameForUpdate').value
        let updateID = document.getElementById('updateID').value
        if (categoryNameForUpdate.length === 0) {
            errorToast('Category is required')
        } else {
            document.getElementById('update-modal-close').click()
            showLoader()
            let res = await axios.post('/category-update', {
                name: categoryNameForUpdate,
                id: updateID
            })
            hideLoader()
            if (res.status === 200 && res.data === 1) {
                await getList()
                successTaost('Request Successful')

            } else {
                errorToast('Request  failed')
            }
        }
    }
</script>
