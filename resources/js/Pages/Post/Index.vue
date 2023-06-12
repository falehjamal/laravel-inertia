<template>
    <div class="mt-5">
        <!-- flash message -->
        <div v-if="$page.props.flash.message" class="alert alert-success" role="alert">
            {{ $page.props.flash.message }}
        </div>

        <div class="mb-3">
            <Link href="/posts/create" class="btn btn-md btn-primary">
            <i class="fa fa-plus"></i>
        Add</Link>
        <!-- <Link :href="`route('/users')`">Ok</Link> -->
        </div>

        <div class="card border-0 rounded shadow-sm">
            <div class="card-body">
                <table id="tabel-data" class="table table-striped table-bordered" cellspacing="0" width="150%">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">TITLE</th>
                            <th scope="col">CONTENT</th>
                            <th scope="col">ACTIONS</th>
                        </tr>
                    </thead>
                    <tbody style="height: 100px; overflow: scroll;">
                        <tr v-for="post,index in posts" :key="post.id">
                            <td>{{ ++index }}</td>
                            <td>{{ post.title }}</td>
                            <td>{{ post.content }}</td>
                            <td>
                                <Link :href="`/posts/${post.id}/edit`" class="btn btn-sm btn-primary me-2"><i class="fa fa-pencil"></i></Link>
                                <button @click.prevent="deletePost(`${post.id}`)" class="btn btn-sm btn-danger" onclick="return confirm('Ok');"><i class="fa fa-trash"></i></button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        
                <!-- Button trigger modal -->
        <!-- <button type="button" class="btn btn-primary mt-5" data-bs-toggle="modal" data-bs-target="#exampleModal">
          Modal
        </button> -->

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Confirm</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                Oh yes?
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                <button type="button" class="btn btn-primary" @click.prevent="deletePost(`${post.id}`)">Yes</button>
              </div>
            </div>
          </div>
        </div>
    </div>
</template>

<script>
    //import layout
    import LayoutApp from '../../Layouts/App.vue'

    //import Link dari inertia
    import { Link } from '@inertiajs/inertia-vue3';

    import { Inertia } from '@inertiajs/inertia'

    export default {

        //layout
        layout: LayoutApp,

        //register Link di component
        components: {
            Link
        },

        //props
        props: {
            posts: Array // <- nama props yang dibuat di controller saat parsing data
        },

        //define Composition Api
        setup() {

            //method deletePost
            function deletePost(id) {
               Inertia.delete(`/posts/${id}`);
            }
           const showModal = (id) => {
                // form.post(route('posts.store'));
            console.log(id);
            };

            return {
                deletePost,
                showModal
            }

        }
    }
</script>

<style>

</style>
