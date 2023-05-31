<template>

    <div>
        <div class="card border-0 rounded shadow">
            <div class="card-body">
                <h4>TAMBAH POST</h4>
                <hr>
                <form @submit.prevent="submit">
                    <div class="mb-3">
                        <label class="form-label">TITLE POST</label>
                        <input type="text" class="form-control" v-model="form.title" placeholder="Masukkan Title Post">
                        <div v-if="errors.title" class="mt-2 alert alert-danger">
                            <!-- {{ errors.title }} -->
                            Mohon isi form ini
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">CONTENT</label>
                        <textarea class="form-control" rows="5" v-model="form.content" placeholder="Masukkan Content Post"></textarea>
                        <div v-if="errors.content" class="mt-2 alert alert-danger">
                            <!-- {{ errors.content }} -->
                             Mohon isi form ini
                        </div>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary btn-md shadow-sm me-2">SIMPAN</button>
                        <button type="reset" class="btn btn-warning btn-md shadow-sm me-2">RESET</button>
                        <Link href="/posts" class="btn btn-info ml-4 btn-md shadow-sm ">Kembali</Link> 
                    </div>
                </form>
            </div>
        </div>
    </div>

</template>

<script>
    //import layout
    import LayoutApp from '../../Layouts/App.vue'

    import { reactive } from 'vue'
    import { Inertia } from '@inertiajs/inertia'
    import { Link } from '@inertiajs/inertia-vue3'
    import { useForm } from "@inertiajs/inertia-vue3";

    export default {

        //layout
        layout: LayoutApp,

        //props
        props: {
            errors: Object
        },
        components:{
            Link,

        },

        //define Composition Api
        setup() {
            const form = useForm({
                title: '',
                content: '',
                
            });
            const submit = () => {
                form.post(route('posts.store'));
            };

            return {
            submit,
            form

            }

        }
    }
</script>