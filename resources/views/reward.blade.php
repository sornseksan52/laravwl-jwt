<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>สุ่มรางวัล</title>
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
            <div class="container-fluid">
              <div class="row justify-content-center mt-5">
                <div class="col-12">
                  <div class="card">
                    <div class="card-body">
                        <v-row>
                            <v-col cols="12" md="6">
                                <template>
                                    <div>
                                      <v-data-table
                                        :headers="headers_reward"
                                        :items="reward"
                                        item-key="id"
                                        class="elevation-1"
                                        :search="search"
                                      >
                                      <template v-slot:top>
                                            <v-row>
                                                <v-col cols="12" md="8">
                                                    <v-text-field
                                                      v-model="search"
                                                      label="Search Reward"
                                                      class="mx-4"
                                                    ></v-text-field>
                                                </v-col>
                                                <v-col cols="12" md="4" class="text-right">
                                                    <v-btn color="success darken-1"  class="mx-4 mt-2" small @click="random">Random</v-btn>
                                                </v-col>
                                            </v-row>
                                        </template>
                                        {{-- <template v-slot:item="{item, index}">
                                            <tr>
                                              <td>@{{index + 1}}</td>
                                              <td>@{{item.name}}</td>
                                              <td>@{{item.client_id}}</td>
                                              <td>@{{item.game_item_id}}</td>
                                              <td>@{{item.stock}}</td>
                                            </tr>
                                        </template> --}}
                                      </v-data-table>
                                    </div>
                                  </template>
                            </v-col>
                            <v-col cols="12" md="6">
                                <template>
                                    <div>
                                      <v-data-table
                                        :headers="headers_reward_random"
                                        :items="reward_random"
                                        class="elevation-1"
                                        item-key="id"
                                        :search="search_random"
                                        sort-by="id"
                                        :sort-desc="true"
                                      >
                                        <template v-slot:top>
                                          <v-text-field
                                            v-model="search_random"
                                            label="Search Reward Random"
                                            class="mx-4"
                                          ></v-text-field>
                                        </template>
                                        {{-- <template v-slot:item="{item, index}">
                                            <tr>
                                              <td>@{{index + 1}}</td>
                                              <td>@{{item.name}}</td>
                                              <td>@{{item.client_id}}</td>
                                              <td>@{{item.game_item_id}}</td>
                                              <td>@{{item.qty}}</td>
                                            </tr>
                                        </template> --}}
                                      </v-data-table>
                                    </div>
                                  </template>
                            </v-col>
                        </v-row>
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

        var app = new Vue({
            el: '#app',
            vuetify: new Vuetify(),
            data() {
                return {

                    headers_reward : [
                        { text: '#', value: 'id' ,align: 'start',  sortable: false},
                        {
                        text: 'Name',
                        align: 'start',
                        value: 'name',
                        },
                        { text: 'Game item id', value: 'game_item_id', align : 'center'},
                        { text: 'Chance', value: 'chance' },
                        { text: 'Stock', value: 'stock' ,align : 'right'}
                    ],
                    reward : [],

                    headers_reward_random : [
                        { text: 'ครั้งที่สุ่ม', value: 'id' ,align: 'start',  /*sortable: false*/},
                        {
                        text: 'Name',
                        align: 'start',
                        // sortable: false,
                        value: 'name',
                        },
                        { text: 'Game item id', value: 'game_item_id' },
                        // { text: 'Chance', value: 'chance' },
                        { text: 'Qty', value: 'qty' }
                    ],
                    reward_random : [],

                    search : "",
                    search_random : "",

                }
            },
            computed: {

            },
            watch: {

            },
            created () {

            },
            mounted() {
                this.getReward()
            },
            methods: {

                random : async function(){
                    let res = await this.ajax_post("{{asset('api/random')}}","GET",{})

                    if(res.status == "success"){
                        Swal.fire({
                            title: "ผลการสุ่มรายวัน",
                            text: `ขอแสดงความยินดี คุณได้รับ ${res.reward.name}`,
                            icon: "success",
                        }).then(async (result) => {
                            this.getReward()
                            this.reward_random = res.reward_log
                        });
                    }else if(res.status == "exceed_limit"){

                        Swal.fire({
                            title: "การสุ่มรายวัน",
                            text: 'จำนวนครั้งการสุ่มเกินที่กำหนดไว้!',
                            icon: "warning",
                        }).then(async (result) => {

                        });
                    }else{
                        this.reward_random = []
                    }

                },
                getReward : async function(){
                    let res = await this.ajax_post("{{asset('api/getReward')}}","GET",{})
                    this.reward = res.reward
                    this.reward_random = res.reward_log
                },

                ajax_post : async function ajax_post(path, type,data) {
                    let result;
                    try {
                        result = await $.ajax({
                            type: type,
                            url:  path,
                            dataType: "json",
                            data: data,
                            // headers: {
                            //     'Authorization': 'Bearer '+token
                            // },
                            beforeSend: function() {

                            },
                            success: function(data, textStatus, jqXHR) {

                                // console.log("Data : ",textStatus ,jqXHR.status);
                            },
                            error: function(jqXHR, textStatus, errorThrown) {
                                // console.log('Error:', jqXHR.status, textStatus, errorThrown);
                                if(jqXHR.status == 422){
                                    if(textStatus == "error"){
                                        Swal.fire({
                                            title: "เเจ้งเตือน",
                                            html: JSON.stringify(jqXHR.responseJSON , undefined, 2),
                                            icon: "error",
                                        }).then(async (result) => {
                                            // window.location.reload();
                                            // window.location.href = "{{ asset('api/auth/login') }}";
                                        });

                                    }
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
