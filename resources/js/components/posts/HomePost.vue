<template>
  <!-- <div class="poster">
    <div class="row mx-0">
      <div class="col-sm-3 px-0 my-auto">
        <div class="px-0">
          <router-link :to="{ name: 'read', params: { title: post.title } }">
            <img
              :src="`/storage/${post.image}`"
              class="img-fluid"
              :alt="`${post.image}`"
              width="273"
              height="172"
            />
          </router-link>
        </div>
      </div>
      <div class="col-sm-9 my-auto">
        <div class="sutun-dokuz pl-0">
          <div class="">


            <h5>

              <router-link
                :to="{
                  name: 'getcategory',
                  params: { name: post.category.name }
                }"
                class="card-category-title"
              >
                {{ post.category.name }}</router-link
              >
            </h5>

            <h5>

              <router-link
                :to="{
                  name: 'read',
                  params: { title: post.title }
                }"
                class="card-main-title"
              >
                {{ post.title }}</router-link
              >
            </h5>

            <h5>
              <em>


                <router-link
                  :to="{
                    name: 'getauthor',
                    params: { name: post.author.name }
                  }"
                  class="card-author-title"
                  ><strong>{{ post.author.name }}</strong>
                </router-link></em
              >
              <pre class="d-inline date-sizes pl-1">published on </pre>
              <span class="date-sizes text-black-50">{{ post.published }}</span>
            </h5>

            <p>

            </p>
          </div>
        </div>
      </div>
    </div>

  </div> -->
  <div class="p-grid p-nogutter">
    <DataView :value="post" layout="grid" :paginator="true" :rows="4">
      <template #grid="slotProps">
        <div class="p-col-4 p-md-6 p-lg-3 my-3">
          <Card class="main-post">
            <template slot="header">
              <router-link
                :to="{
                  name: 'read',
                  params: { title: slotProps.data.title }
                }"
              >
                <img
                  alt="user header"
                  :src="`/storage/${slotProps.data.image}`"
                />
              </router-link>
            </template>

            <template slot="title">
              <pre class="d-inline text-secondary pl-1 date-sizes">in</pre>
              <router-link
                :to="{
                  name: 'getcategory',
                  params: { name: slotProps.data.category.name }
                }"
                class="card-category-title"
              >
                {{ slotProps.data.category.name }}
              </router-link>

              <em>
                <pre class="d-inline text-secondary pl-1 date-sizes">by</pre>
                <router-link
                  :to="{
                    name: 'getauthor',
                    params: { name: slotProps.data.author.name }
                  }"
                  class="card-author-title"
                >
                  {{ slotProps.data.author.name }}
                </router-link>
              </em>
            </template>
            <template slot="title">
              <h5 class="mt-1">
                <router-link
                  :to="{
                    name: 'read',
                    params: { title: slotProps.data.title }
                  }"
                  class="card-main-title"
                >
                  {{ slotProps.data.title }}
                </router-link>
              </h5>
            </template>
            <template slot="subtitle"> </template>

            <template slot="content">
              <p class="m-1" v-if="slotProps.data.content.length > 120">
                <router-link
                  :to="{
                    name: 'read',
                    params: { title: slotProps.data.title }
                  }"
                  class="card-main-text"
                >
                  {{ slotProps.data.content.slice(0, 120) + '...' }}
                </router-link>
              </p>
            </template>
            <template slot="footer"> </template>
            <hr class="card-hr" />
          </Card>
        </div>
      </template>
    </DataView>
  </div>
</template>

<script>
export default {
  inheritAttrs: false,
  props: {
    post: {
      type: Object,
      required: true
    }
  }
};
</script>

<style scoped></style>
