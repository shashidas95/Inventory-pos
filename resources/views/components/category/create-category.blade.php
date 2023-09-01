<!-- Modal -->
<div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Create Category </h1>
                <button type="button" class="btn-close btn-primary btn" data-bs-dismiss="modal" aria-label="Close">
                    &times;</button>
            </div>
            <div class="modal-body">
                <form id="save-form">
                    <div class="mb-3">
                        <label for="categoryName" class="form-label">Category Name </label>
                        <input type="text" class="form-control" id="categoryName">
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button id="modal-close" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button onclick="Save()" id="save-btn" type="button" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>

<script>
    // async function Save() {
    //     let categoryName = document.getElementById('categoryName').value
    //     if (categoryName.length === 0) {
    //         errorToast('Category is requered!')
    //     } else {
    //         document.getElementById('modal-close').click()

    //         showLoader()

    //         const res = await axios.post('/category-create', {
    //             name: categoryName
    //         })
    //         hideLoader()
    //         if (res.status === 201) {
    //             successToast('Category Created succesfully')
    //             document.getElementById('save-form').reset()
    //             await getList()
    //         } else {
    //             errorToast('request is failed!')
    //         }
    //     }
    // }
    async function Save() {
        let categoryName = document.getElementById('categoryName').value
        if (categoryName.length === 0) {
            errorToast('Category is requered!')
        } else {
            document.getElementById('modal-close').click()
            showLoader()

            try {
                const response = await axios.post('/category-create', {
                    name: categoryName
                })
                hideLoader()
                successToast('Category Created succesfully')
                document.getElementById('save-form').reset()
                await getList()

            } catch (error) {
                errorToast('request is failed!')
               // console.error(error);
            }
        }
    }
</script>
