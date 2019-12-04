<template>
  <div class="col-md-2 px-0">
    <div class="admin-sidebar">
      <div class="admin-inner-sidebar">
        <ul class="nav flex-column pt-5">
          <li class="nav-item admin-list">
            <a href="#" class="nav-link admin-link">Posts</a>
          </li>
          <li class="nav-item admin-list">
            <a href="#" class="nav-link admin-link">Categories</a>
          </li>
          <li class="nav-item admin-list">
            <a href="#" class="nav-link admin-link">Authors</a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</template>

<script>
export default {};
</script>

<style lang="scss" scoped>
.admin-sidebar {
  //width: 200px;
  height: 100vh;
  //background-color: #241717;
  //background-color: #130144;
  //background-color: #390391;
  background-color: #290144;
}
.admin-list {
}
.admin-list:hover {
  background-color: rgb(143, 133, 133);
  transition: background-color 300ms ease-out;
}
.admin-link {
  font-size: 1.1rem;
  color: #f5f5f6;
}
.admin-link:hover {
  color: #fff;
}
</style>
