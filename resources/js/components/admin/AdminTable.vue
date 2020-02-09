<template>
  <table class="table table-sm table-bordered bg-light">
    <thead class="thead-light">
      <th class="text-center text-justify">Image</th>
      <th class="text-center text-justify">Title</th>
      <th class="text-center text-justify">Content</th>
      <th class="text-center text-justify">Author</th>
      <th class="text-center text-justify">Category</th>
      <th class="text-center text-justify">Comments</th>
      <th class="text-center text-justify">Edit</th>
      <th class="text-center text-justify">Delete</th>
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
        <td v-if="post.content.length > 100" class="align-middle text-justify">
          {{ post.content.substring(0, 100) + '...' }}
        </td>
        <td v-else class="align-middle text-justify">
          {{ post.content.substring(0, 100) }}
        </td>

        <td class="text-center align-middle text-justify">
          {{ post.author_id }}
        </td>
        <td class="text-center align-middle text-justify">
          {{ post.category_id }}
        </td>
        <td class="text-center align-middle text-justify">
          {{ post.comment_id }}
        </td>
        <td class="text-center align-middle text-justify">
          <router-link
            :to="{ name: 'editpost', params: { title: post.title } }"
          >
            <button
              class="btn btn-sm btn-success "
              data-toggle="modal"
              data-target="#myModal"
            >
              Edit
            </button>
          </router-link>
        </td>
        <td class="text-center align-middle text-justify">
          <button class="btn btn-sm btn-danger">Trash</button>
        </td>
      </tr>
    </tbody>
  </table>
</template>

<script>
export default {
  props: {
    posts: {
      type: [Object, Array],
      required: true
    }
  }
};
</script>

<style lang="scss" scoped></style>
