<template>
  <table class="table table-sm table-bordered bg-light">
    <thead class="thead-light">
      <th class="text-center text-justify">Image</th>
      <th class="text-center text-justify">Title</th>
      <th class="text-center text-justify">Content</th>
      <th class="text-center text-justify">Author</th>
      <th class="text-center text-justify">Category</th>
      <!-- <th class="text-center text-justify">Comments</th> -->
      <!-- <th class="text-center text-justify">Edit</th>
      <th class="text-center text-justify">Delete</th> -->
      <th class="text-center text-justify">Actions</th>
    </thead>
    <tbody>
      <tr v-for="post in posts" :key="post.id">
        <td class="text-center align-middle text-justify">
          <img
            :src="`/images/${post.image}`"
            :alt="`/images/${post.title}`"
            class="img-fluid"
            width="100"
            height="50"
          />
        </td>
        <td class="align-middle text-justify">{{ post.title }}</td>
        <td v-if="post.content.length > 200" class="align-middle text-justify">
          {{ post.content.substring(0, 200) + '...' }}
        </td>
        <td v-else class="align-middle text-justify">
          {{ post.content }}
        </td>

        <td class="text-center align-middle text-justify">
          {{ post.author.name }}
        </td>
        <td class="text-center align-middle text-justify">
          {{ post.category.name }}
        </td>

        <td class="text-left align-middle text-justify">
          <router-link
            :to="{ name: 'editpost', params: { title: post.title } }"
            class="btn btn-sm btn-secondary "
            data-toggle="modal"
            data-target="#myModal"
            ><template>
              <b-icon-pencil animation="fade"
                ><em></em
              ></b-icon-pencil> </template
          ></router-link>
          <!-- <button
            class="btn btn-sm btn-secondary "
            data-toggle="modal"
            data-target="#myModal"
          >
            <template>
              <b-icon-pencil animation="fade"><em></em></b-icon-pencil>
            </template>
          </button> -->
          <button class="btn btn-sm btn-danger">
            <b-icon icon="trash-fill" aria-hidden="true"></b-icon>
          </button>
        </td>
      </tr>
    </tbody>
  </table>
</template>

<script>
import { BIcon, BIconPencil } from 'bootstrap-vue';

export default {
  components: {
    BIcon,
    BIconPencil
  },
  props: {
    posts: {
      type: Array,
      required: true
    }
  }
};
</script>

<style lang="scss" scoped></style>
