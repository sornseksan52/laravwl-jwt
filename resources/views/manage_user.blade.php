<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>จัดการ User</title>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
        <link href="https://cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/7.1.96/css/materialdesignicons.min.css" integrity="sha512-NaaXI5f4rdmlThv3ZAVS44U9yNWJaUYWzPhvlg5SC7nMRvQYV9suauRK3gVbxh7qjE33ApTPD+hkOW78VSHyeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    </head>
  <body>
    <div id="app">
        <v-app>
        <v-main>
            <div class="container">
              <div class="row justify-content-center mt-5">
                <div class="col-md-12">
                  <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">

                                <template>
                                    <v-data-table
                                      :headers="headers"
                                      :items="desserts"
                                      sort-by="calories"
                                      class="elevation-1"
                                    >
                                      <template v-slot:top>
                                        <v-toolbar
                                          flat
                                        >
                                          <v-toolbar-title>Manage User</v-toolbar-title>
                                          <v-divider
                                            class="mx-4"
                                            inset
                                            vertical
                                          ></v-divider>
                                          <v-spacer></v-spacer>
                                          <v-dialog
                                            v-model="dialog"
                                            max-width="500px"
                                          >
                                            <template v-slot:activator="{ on, attrs }">
                                              <v-btn
                                                color="primary"
                                                dark
                                                class="mb-2"
                                                v-bind="attrs"
                                                v-on="on"
                                              >
                                                New Item
                                              </v-btn>
                                            </template>
                                            <v-card>
                                              <v-card-title>
                                                <span class="text-h5">@{{ formTitle }}</span>
                                              </v-card-title>

                                              <v-card-text>
                                                <v-container>
                                                  <v-row>
                                                    <v-col
                                                      cols="12"
                                                      sm="6"
                                                      md="12"
                                                    >
                                                      <v-text-field
                                                        v-model="editedItem.name"
                                                        label="Name"
                                                      ></v-text-field>
                                                    </v-col>
                                                    <v-col
                                                      cols="12"
                                                      sm="6"
                                                      md="12"
                                                    >
                                                      <v-text-field
                                                        v-model="editedItem.username"
                                                        label="Username"
                                                      ></v-text-field>
                                                    </v-col>
                                                    <v-col
                                                      cols="12"
                                                      sm="6"
                                                      md="12"
                                                    >
                                                      <v-text-field
                                                        v-model="editedItem.password"
                                                        label="Password"
                                                        type="password"
                                                      ></v-text-field>
                                                    </v-col>
                                                    <v-col
                                                      cols="12"
                                                      sm="6"
                                                      md="12"
                                                    >
                                                      <v-text-field
                                                        v-model="editedItem.email"
                                                        label="Email"
                                                      ></v-text-field>
                                                    </v-col>
                                                    <v-col
                                                      cols="12"
                                                      sm="6"
                                                      md="12"
                                                    >
                                                      <v-text-field
                                                        v-model="editedItem.phone"
                                                        label="Phone"
                                                      ></v-text-field>
                                                    </v-col>
                                                    <v-col
                                                      cols="12"
                                                      sm="6"
                                                      md="12"
                                                    >
                                                      <v-text-field
                                                        v-model="editedItem.company"
                                                        label="Company"
                                                      ></v-text-field>
                                                    </v-col>
                                                    <v-col
                                                      cols="12"
                                                      sm="6"
                                                      md="12"
                                                    >
                                                      <v-text-field
                                                        v-model="editedItem.nationality"
                                                        label="Nationality"
                                                      ></v-text-field>
                                                    </v-col>
                                                  </v-row>
                                                </v-container>
                                              </v-card-text>

                                              <v-card-actions>
                                                <v-spacer></v-spacer>
                                                <v-btn
                                                  color="blue darken-1"
                                                  text
                                                  @click="close"
                                                >
                                                  Cancel
                                                </v-btn>
                                                <v-btn
                                                  color="blue darken-1"
                                                  text
                                                  @click="save"
                                                >
                                                  Save
                                                </v-btn>
                                              </v-card-actions>
                                            </v-card>
                                          </v-dialog>
                                          <v-dialog v-model="dialogDelete" max-width="500px">
                                            <v-card>
                                              <v-card-title class="text-h5">Are you sure you want to delete this item?</v-card-title>
                                              <v-card-actions>
                                                <v-spacer></v-spacer>
                                                <v-btn color="blue darken-1" text @click="closeDelete">Cancel</v-btn>
                                                <v-btn color="blue darken-1" text @click="deleteItemConfirm">OK</v-btn>
                                                <v-spacer></v-spacer>
                                              </v-card-actions>
                                            </v-card>
                                          </v-dialog>
                                        </v-toolbar>
                                      </template>
                                      <template v-slot:item.actions="{ item }">
                                        <v-icon
                                          small
                                          class="mr-2"
                                          @click="editItem(item)"
                                        >
                                          mdi-pencil
                                        </v-icon>
                                        <v-icon
                                          small
                                          @click="deleteItem(item)"
                                        >
                                          mdi-delete
                                        </v-icon>
                                      </template>
                                      <template v-slot:no-data>
                                        <v-btn
                                          color="primary"
                                          @click="initialize"
                                        >
                                          Reset
                                        </v-btn>
                                      </template>
                                    </v-data-table>
                                  </template>

                            </div>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </v-main>
        </v-app>
    </div>


    <!-- jQuery and Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.x/dist/vue.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.js"></script>

    <script>

        let token = "{{$session_login['access_token']}}"


        var app = new Vue({
            el: '#app',
            vuetify: new Vuetify(),
            data() {
                return {

                    dialog: false,
                    dialogDelete: false,
                    headers: [
                        {
                        text: 'Name',
                        align: 'start',
                        sortable: false,
                        value: 'name',
                        },
                        { text: 'Email', value: 'email' },
                        { text: 'Username', value: 'username' },
                        { text: 'Phone', value: 'phone' },
                        { text: 'Company', value: 'company' },
                        { text: 'Nationality', value: 'nationality' },
                        { text: 'Actions', value: 'actions', sortable: false },
                    ],
                    desserts: [],
                    editedIndex: -1,

                    editedItem: {
                        name : '',
                        username : '',
                        password : '',
                        email : '' ,
                        phone : '',
                        company : '',
                        nationality : ''
                    },

                    defaultItem: {
                        name : '',
                        username : '',
                        password : '',
                        email : '' ,
                        phone : '',
                        company : '',
                        nationality : ''
                    },

                }
            },
            computed: {
                formTitle () {
                    return this.editedIndex === -1 ? 'New Item' : 'Edit Item'
                },
            },
            watch: {
                dialog (val) {
                    val || this.close()
                },
                dialogDelete (val) {
                    val || this.closeDelete()
                },
            },
            created () {
                this.initialize()
            },
            mounted() {
                this.get_user()
            },
            methods: {
                initialize () {
                    this.desserts = []
                },

                editItem (item) {
                    this.editedIndex = this.desserts.indexOf(item)
                    this.editedItem = Object.assign({}, item)
                    this.dialog = true
                },

                deleteItem (item) {
                    this.editedIndex = this.desserts.indexOf(item)
                    this.editedItem = Object.assign({}, item)
                    this.dialogDelete = true
                },

                deleteItemConfirm : async function() {

                    let res = await this.ajax_post("{{asset('api/auth/delete-user')}}","POST",{id : this.editedItem.id})
                    if(res.status == "success"){
                        this.desserts.splice(this.editedIndex, 1)
                        this.closeDelete()
                    }
                },

                close () {
                    this.dialog = false
                    this.$nextTick(() => {
                    this.editedItem = Object.assign({}, this.defaultItem)
                    this.editedIndex = -1
                    })
                },

                closeDelete () {
                    this.dialogDelete = false
                    this.$nextTick(() => {
                    this.editedItem = Object.assign({}, this.defaultItem)
                    this.editedIndex = -1
                    })
                },

                save : async function() {
                    let res = await this.ajax_post("{{asset('api/auth/register')}}","POST", this.editedItem)
                    if (this.editedIndex > -1) {
                        Object.assign(this.desserts[this.editedIndex], this.editedItem)
                    } else {
                        this.desserts.push(this.editedItem)
                    }
                    this.close()
                },
                get_user : async function(){

                    let res = await this.ajax_post("{{asset('api/auth/get-user')}}","GET",{})
                    this.desserts = res

                },
                ajax_post : async function ajax_post(path, type,data) {
                    let result;
                    try {
                        result = await $.ajax({
                            type: type,
                            url:  path,
                            dataType: "json",
                            data: data,
                            headers: {
                                'Authorization': 'Bearer '+token
                            },
                            beforeSend: function() {

                            },
                            success: function(data, textStatus, jqXHR) {

                                // console.log("Data : ",textStatus ,jqXHR.status);
                            },
                            error: function(jqXHR, textStatus, errorThrown) {
                                // console.log('Error:', jqXHR.status, textStatus, errorThrown);
                                if(jqXHR.status == 422){
                                    console.log(jqXHR.responseText);
                                }else if(jqXHR.status == 401){
                                    if(textStatus == "error"){
                                        Swal.fire({
                                            title: "เเจ้งเตือน",
                                            text: errorThrown,
                                            icon: "error",
                                        }).then(async (result) => {
                                            // window.location.reload();
                                            window.location.href = "{{ asset('api/auth/login') }}";
                                        });

                                    }
                                }

                            }
                        });

                    } catch (error) {

                        result = error;
                    }
                    return result;
                }
            },
        })


    </script>

  </body>
</html>
