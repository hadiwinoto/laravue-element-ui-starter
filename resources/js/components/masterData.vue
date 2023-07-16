<template>
    <div class="container">
        <div class="row">
            <SideMenu></SideMenu>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <span><b>Master Jenis Perbaikan</b></span>
                            <el-button
                                class="mb-2"
                                style="float: right"
                                size="small"
                                type="primary"
                                @click="showModal = true"
                                >Tambah Data</el-button
                            >
                            <table class="table table-bordered table-sm">
                                <thead class="table-light">
                                    <tr>
                                        <th width="4%" class="text-center">No.</th>
                                        <th width="70%">Nama Jenis</th>
                                        <th width="15%" class="text-center">
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr
                                        v-for="(pbr, idx) in jenisperbaiakan"
                                        :key="idx"
                                    >
                                        <td class="text-center">{{ idx+1 }}</td>
                                        <td>{{ pbr.name }}</td>
                                        <td class="text-center">
                                            <el-button
                                                size="mini"
                                                @click="handleEdit(pbr.id)"
                                                >Edit</el-button
                                            >
                                            <el-button
                                                size="mini"
                                                type="danger"
                                                @click="confirmDelete(pbr.id)"
                                                >Delete</el-button
                                            >
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <Modal
            :based-on="showModal"
            title="Input Data"
            @close="showModal = false"
        >
            <div class="row">
                <form @submit.prevent="tambahData">
                    <div class="form-group row mb-3">
                        <label class="col-sm-4 col-form-label"
                            >Nama Jenis</label
                        >
                        <div class="col-sm-8">
                            <input
                                type="text"
                                v-model="form.jenis_perbaikan"
                                class="form-control"
                            />
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label class="col-sm-4 col-form-label"></label>
                        <div class="col-sm-8">
                            <button
                                type="submit"
                                :disabled="buttondisabled"
                                class="btn btn-primary"
                                size="small"
                            >
                                <span
                                    :class="buttonloading"
                                    role="status"
                                    aria-hidden="true"
                                ></span
                                >Submit
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </Modal>
    </div>
</template>

<script>
import SideMenu from "./master/SideMenu.vue";
export default {
    components: {
        SideMenu,
    },
    data() {
        return {
            isLoadingContent: false,
            jenisperbaiakan: [],
            showModal: false,
            search: "",
            buttonloading: "",
            buttondisabled: false,
            form: {
                jenis_perbaikan: "",
            },
            buttonloading: "",
            buttondisabled: false,
        };
    },
    created() {
        this.getData();
    },
    methods: {
        getData(id) {
            this.isLoadingContent = true;
            this.$http.get("/master-data/fetch-perbaikan").then((response) => {
                this.jenisperbaiakan = response.data;
                this.isLoadingContent = false;
            });
        },
        handleEdit(id) {
            this.$http
                .get("/master-data/fetch-perbaikan", {
                    params: {
                        id: id,
                    },
                })
                .then((response) => {
                    this.jenisperbaiakan = response.data;
                    this.isLoadingContent = false;
                })
                .catch(() => {
                    console.log("Gagal Ambil Data!");
                });
        },

        confirmDelete(idjenis) {
            this.$confirm(
                "This will permanently delete the Data. Continue?",
                "Warning",
                {
                    confirmButtonText: "OK",
                    cancelButtonText: "Cancel",
                    type: "warning",
                    center: true,
                }
            )
                .then(() => {
                    this.$http
                        .post("/master-data/delete-master-perbaikan/" + idjenis)
                        .then((Response) => {
                            this.$awn.success("Success Delete Data!");
                            this.getData();
                        });
                })
                .catch(() => {
                    this.$awn.alert("Gagal Delete Data!");
                    this.getData();
                });
        },
        tambahData() {
            let data = this.form;
            this.buttonloading = "spinner-border spinner-border-sm";
            this.buttondisabled = true;
            this.$http
                .post("/master-data/delete-master-perbaikan/data/tambah", data)
                .then((Response) => {
                    this.$awn.success("Sukses Submit Data");
                    this.getData();
                    this.showModal = false;
                    this.buttonloading = "";
                    this.buttondisabled = false;
                })
                .catch((error) => {
                    this.$awn.alert("Gagal Submit Data");
                    this.showModal = false;
                    this.buttonloading = "";
                    this.buttondisabled = false;
                });
        },
    },
};
</script>
