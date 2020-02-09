<template>
  <footer class="footer">
    <div class="container-fluid footer">
      <div class="row">
        <div class="col-sm-12">
          <div class="text-center footer-inner">
            <p class="lead text-white">
              Copyright @ {{ writeToday }} by Kubila
            </p>
          </div>
        </div>
      </div>
    </div>
  </footer>
</template>

<script>
export default {
  computed: {
    writeToday() {
      let today = new Date();
      /*
      let date =
        today.getDate() +
        ' ' +
        (today.getMonth() + 1) +
        ' ' +
        today.getFullYear();
      let time = today.getHours() + ':' + today.getMinutes();
      */
      return today.toLocaleDateString();
    }
  }
};
</script>

<style lang="scss" scoped></style>
