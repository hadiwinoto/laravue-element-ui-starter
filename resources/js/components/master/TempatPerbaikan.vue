<template>
    <div class="container">
        <div class="row">
            <SideMenu></SideMenu>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-body">
                        <span><b>Master Tempat Perbaikan</b></span>
                        <el-button
                            class="mb-2"
                            style="float: right"
                            size="small"
                            type="primary"
                            @click="showModal = true"
                            >Tambah Data</el-button
                        >
                        <div class="table-responsive"></div>
                        <table class="table table-bordered table-sm">
                            <thead class="table-light">
                                <tr>
                                    <th width="4%" class="text-center">No.</th>
                                    <th width="70%">Nama Tempat</th>
                                    <th width="15%" class="text-center">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr
                                    v-for="(pbd, idxk) in tempatperbaikan"
                                    :key="idxk"
                                >
                                    <td class="text-center">{{ idxk + 1 }}</td>
                                    <td>{{ pbd.name }}</td>
                                    <td class="text-center">
                                        <el-button
                                            size="mini"
                                            @click="getById(pbd.id)"
                                            >Edit</el-button
                                        >
                                        <el-button
                                            size="mini"
                                            type="danger"
                                            @click="confirmDelete(pbd.id)"
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
        <Modal :based-on="showModal" title="Input Data" @close="onClose()">
            <div class="row">
                <form @submit.prevent="onSubmit">
                    <div class="form-group row mb-3">
                        <label class="col-sm-4 col-form-label"
                            >Nama Tempat</label
                        >
                        <div class="col-sm-8">
                            <input
                                type="text"
                                v-model="form.name"
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
import SideMenu from "./SideMenu.vue";
export default {
    components: {
        SideMenu,
    },
    data() {
        return {
            id: null,
            buttonloading: "",
            buttondisabled: false,
            isLoadingContent: false,
            showModal: false,
            showModalMassal: false,
            tempatperbaikan: [],
            show: true,
            form: {
                name: "",
            },
        };
    },
    created() {
        this.getData();
    },
    methods: {
        onClose() {
            this.showModal = false;
            this.form.name = null;
        },
        getData() {
            this.isLoadingContent = true;
            this.$http
                .get("/master-data/fetch-tempat-perbaikan")
                .then((response) => {
                    this.tempatperbaikan = response.data.data;
                    this.isLoadingContent = false;
                });
        },
        getById(id) {
            this.id = id;
            this.showModal = true;
            this.$http
                .get("/master-data/fetch-tempat-perbaikan-byid", {
                    params: {
                        id: id,
                    },
                })
                .then((response) => {
                    this.form.name = response.data.data.name;
                    this.isLoadingContent = false;
                })
                .catch((error) => {
                    console.log("Gagal Memuat Data");
                });
        },
        confirmDelete(id) {
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
                        .post("/master-data/tempat-perbaikan.delete/" + id)
                        .then((Response) => {
                            this.$awn.success("Success Delete Data!");
                            this.getData();
                            this.id = null;
                            this.form.name = null;
                        });
                })
                .catch(() => {
                    this.$awn.alert("Gagal Delete Data!");
                    this.id = null;
                    this.form.name = null;
                    this.getData();
                });
        },
        onSubmit() {
            let data = {
                id: this.id,
                form: this.form,
            };
            this.buttonloading = "spinner-border spinner-border-sm";
            this.buttondisabled = true;
            this.$http
                .post("/master-data/submit-tempat-perbaikan", data)
                .then((Response) => {
                    this.$awn.success("Sukses Submit Data");
                    this.getData();
                    this.showModal = false;
                    this.buttonloading = "";
                    this.buttondisabled = false;
                    this.id = null;
                    this.form.name = null;
                })
                .catch((error) => {
                    this.$awn.alert("Gagal Submit Data");
                    this.showModal = false;
                    this.buttonloading = "";
                    this.buttondisabled = false;
                    this.id = null;
                    this.form.name = null;
                });
        },
    },
};
</script>
