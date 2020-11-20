<template>
    <div class="inner-wrapper">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-8 my-4 mx-auto">
          <div class="content">
            <div style="margin-left: 3rem;">
              <div class="article-title">
                <h1>
                  {{ news.title }}
                </h1>
              </div>
              <!-- <div class="subhead">
                <h4>
                  {{ news.url }}
                </h4>
              </div> -->
            </div>
            <div class="content-inner">
              <div class="p-mt-4 p-mb-2">

                <p class="pl-1 d-inline-block" v-if="news.categories.length > 0">
                  <pre class="d-inline date-sizes">in</pre>
                  <span v-for="cat in news.categories">
                    <router-link
                    class="pl-1 post-category-title"
                    :to="{
                      name: 'getcategory',
                      params: { name: cat.name }
                    }"
                    ><strong>{{cat.name }}</strong></router-link
                  >
                  </span>

                </p>
                <p class="pl-1 d-inline-block" v-else-if="news.categories.length > 1">
                  <pre class="d-inline date-sizes">in</pre>
                  <span v-for="(cat, index) in news.categories">
                    <router-link
                      v-if="index === news.categories.length"
                    class="pl-1 post-category-title"
                    :to="{
                      name: 'getcategory',
                      params: { name: cat.name }
                    }"
                    ><strong>{{ cat.name,}}</strong></router-link
                  >
                  </span>

                </p>


                <span>
                  <pre class="d-inline pl-1 date-sizes">published on</pre>
                  <p v-if="news.created" class="d-inline-block text-black-50">
                    {{ news.created }}
                  </p>
                </span>
              </div>

              <p class="article pt-3 text-left" v-html="news.content"></p>
              <p class="">
                <a :href="`${ news.url }`" target="_blank">{{ news.url }}</a>
              </p>
              <hr />

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'Getnews',
  metaInfo() {
    return {
      title: this.news.title,
      meta: [
        {
          vmid: 'description',
          name: 'description',
          content: this.news.title,
        },
      ],
    };
  },
  props: {
    news: {
      type: Object,
      required: true,
    },
  },
};
</script>

<style lang="scss" scoped></style>
