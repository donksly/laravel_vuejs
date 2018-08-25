<template xmlns:v-on="http://www.w3.org/1999/xhtml">
    <div>
        <div class="form-group">
            <!--<router-link :to="{name: 'createAddress'}" class="btn btn-success">
                Create new address
            </router-link>-->
            <button type="button" id="open_modal_to_add" class="btn btn-success btn-lg"
                    data-toggle="modal" data-target="#myModal" v-on:click="beforeOpen()">
                <i class="fa fa-user-plus"></i> Add new address
            </button>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active"><a href="/">Address list</a></li>
                </ol>
            </div>
            <div class="panel-body">
                <table id="thetable" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>No.</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Company</th>
                        <th>City</th>
                        <th>Address</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="address, index in addresses">
                        <td>{{ ++index }}</td>
                        <td>{{ address.name }}</td>
                        <td>{{ address.email }}</td>
                        <td>{{ address.company }}</td>
                        <td>{{ address.city }}</td>
                        <td>{{ address.address }}</td>
                        <td>
                            <router-link :to="{name: 'editAddress', params: {id: address.id}}"
                                         class="btn btn-primary btn-xs">
                                <i class="fa fa-edit"></i>
                            </router-link>
                        </td>
                        <td>
                            <a href="#" class="btn btn-danger btn-xs"
                               v-on:click="deleteAddress(address.id, index)">
                                <i class="fa fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- modal start -->
        <div class="modal fade" role="dialog" aria-labelledby="gridSystemModalLabel" id="myModal">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="gridSystemModalLabel">Add Address</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <form v-on:submit="saveAddress()" id="add_item_frm">
                        <div class="modal-body">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="form-group">
                                        <label for="addressName" class="control-label">
                                            Name
                                        </label>
                                        <input type="text" v-model="addaddress.name"
                                        class="form-control" id="addressName" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <label for="addressEmail" class="control-label">
                                            Email
                                        </label>
                                        <input type="email" v-model="addaddress.email"
                                               class="form-control" id="addressEmail" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <label for="addressCompany" class="control-label">
                                            Company
                                        </label>
                                        <input type="text" v-model="addaddress.company"
                                               class="form-control" id="addressCompany" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <label for="addressCity" class="control-label">
                                            City
                                        </label>
                                        <input type="text" v-model="addaddress.city"
                                               class="form-control" id="addressCity" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <label for="addressAddress" class="control-label">
                                            Address
                                        </label>
                                        <input type="text" v-model="addaddress.address"
                                               class="form-control" id="addressAddress" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Create New</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal" id="close_modal_btn">Close</button>
                            <button type="reset" id="reset_modal_btn">...</button>
                        </div>
                    </form>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
    </div>
</template>


<script>
    export default{
        data: function () {
            return {
                addresses: [],
                addaddress: {
                    name: '',
                    email: '',
                    company: '',
                    city: '',
                    address: ''
                }
            }
        },
        mounted()
    {
        var app = this;
        axios.get('/addresses')
                .then(function (response) {
                    app.addresses = response.data;
                })
                .catch(function (response) {
                    console.log(response);
                    alert("Could not load addresses");
                });
    }
    ,
    methods: {
        deleteAddress(id, index)
        {
            if (confirm("Do you really want to delete this entry?")) {
                var app = this;
                axios.delete('/delete/' + id)
                        .then(function (response) {
                            //app.addresses.splice(index, 1);
                            alert('Address deleted!');
                            axios.get('/addresses')
                                    .then(function (response) {
                                        app.addresses = response.data;
                                    })
                        })
                        .catch(function (response) {
                            alert("Error: could not delete!" + response);
                        });
            }
        },
        saveAddress(){
            var app = this;
            var newAddress = app.addaddress;
            axios.post('/addAddress', newAddress)
                    .then(function (response) {
                        alert('Address added successfully');
                        $('#close_modal_btn').click();
                        axios.get('/addresses')
                                .then(function (response) {
                                    app.addresses = response.data;
                                })
                    })
                    .catch(function (response) {
                        console.log(response);
                        alert('Error in creating address');
                    });
        },
        beforeOpen(){
            $('#reset_modal_btn').click();
        }
    }
}

</script>

