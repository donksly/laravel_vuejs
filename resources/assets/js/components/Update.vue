<template xmlns:v-on="http://www.w3.org/1999/xhtml">
<div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">All Addresses</a></li>
                <li class="breadcrumb-item active"><a href="#" id="current_active_link">Edit Single</a></li>
            </ol>
        </div>

        <div class="panel-body">
            <form v-on:submit="saveUpdatedDetails()" id="add_item_frm">
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="form-group">
                                <label for="editAddressName" class="control-label">
                                    Name
                                </label>
                                <input type="text" v-model="edit_addaddress.name"
                                       class="form-control" id="editAddressName" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <label for="editAddressEmail" class="control-label">
                                    Email
                                </label>
                                <input type="email" v-model="edit_addaddress.email"
                                       class="form-control" id="editAddressEmail" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <label for="editAddressCompany" class="control-label">
                                    Company
                                </label>
                                <input type="text" v-model="edit_addaddress.company"
                                       class="form-control" id="editAddressCompany" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <label for="editAddressCity" class="control-label">
                                    City
                                </label>
                                <input type="text" v-model="edit_addaddress.city"
                                       class="form-control" id="editAddressCity" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <label for="editAddressAddress" class="control-label">
                                    Address
                                </label>
                                <input type="text" v-model="edit_addaddress.address"
                                       class="form-control" id="editAddressAddress" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-send"></i> Update All</button>
                </div>
            </form>
        </div>
    </div>
</div>
</template>
<script>
    export default {
        mounted() {
            let app = this;
            let id = app.$route.params.id;
            app.addressId = id;
            $('#current_active_link').attr('href', '/#/update/'+id);
            axios.get('/getSingle/' + id)
                    .then(function (response){
                        app.edit_addaddress = response.data;
                    })
                    .catch(function(){
                       alert("Error in loading address details");
                    });

        },
        data: function () {
            return {
                addressId: null,
                edit_addaddress: {
                    name: '',
                    email: '',
                    company: '',
                    city: '',
                    address: ''
                }
            }
        },
    methods: {
        saveUpdatedDetails(){
            var app = this;
            var updatedAddress = app.edit_addaddress;
            axios.patch('/updateAddress/'+app.addressId, updatedAddress)
                    .then(function(response){
                        alert('Data updated successfully.');
                        app.$router.replace('/');
                    })
                    .catch(function(response){
                        console.log(response);
                        alert("Error in updating, email must be unique!");
                    });
        }
    }
}
</script>