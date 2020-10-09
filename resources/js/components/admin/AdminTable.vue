<template>
  <div>
    <!-- <table class="table table-sm table-bordered bg-light">
      <thead class="thead-light">
        <th class="text-center text-justify">Image</th>
        <th class="text-center text-justify">Title</th>
        <th class="text-center text-justify">Content</th>
        <th class="text-center text-justify">Author</th>
        <th class="text-center text-justify">Category</th>

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
          <td
            v-if="post.content.length > 200"
            class="align-middle text-justify"
          >
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
              ><template>
                <b-icon-pencil animation="fade"
                  ><em></em
                ></b-icon-pencil> </template
            ></router-link>

            <button class="btn btn-sm btn-danger">
              <b-icon icon="trash-fill" aria-hidden="true"></b-icon>
            </button>
          </td>
        </tr>
      </tbody>
    </table> -->
    <b-table
      id="my-table"
      :items="items"
      :per-page="perPage"
      :current-page="currentPage"
      small
    ></b-table>
    <div class="overflow-auto">
      <b-pagination
        v-model="currentPage"
        :total-rows="totalRows"
        :per-page="perPage"
        aria-controls="my-table"
      ></b-pagination>
    </div>
  </div>
</template>

<script>
import { BIcon, BIconPencil } from 'bootstrap-vue';
import EditModal from './EditModal';

export default {
  components: {
    BIcon,
    BIconPencil,
    EditModal
  },
  props: {
    // items: {
    //   type: Array,
    //   required: true
    // },
    items: {
      type: Array,
      required: true
    },
    perPage: {
      type: [String, Number],
      required: true
    },
    currentPage: {
      type: [String, Number],
      required: true
    },
    totalRows: {
      type: Array,
      required: true
    }
    // fields: {
    //   type: Array,
    //   required: true
    // }
  },
  data() {
    return {
      fields: [
        { key: 'items.content', label: 'Content' },
        { key: 'items.category.name', label: 'Category' }
      ]
    };
  }
};
</script>

<style lang="scss" scoped></style>
