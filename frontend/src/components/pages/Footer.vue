<template>
  <div class="footer">
    <div class="container">
      <div class="footer-left">
        <ul>
          <li><a href="">Help Center</a></li>
          <li><a href="">About </a></li>
          <li><a href="">Privacy Policy</a></li>
          <li><a href="">Community Guidelines</a></li>
          <li><a href="">Career</a></li>
          <li><a href="">Forum</a></li>
          <li><a href="">Language</a></li>
          <li><a href="">Copyright Policy</a></li>
          <li><a href="">Copyright 2021 by dth999</a></li>
        </ul>
      </div>
    </div>
  </div>
</template>
<style lang="scss">
.footer {
  background-color: #e44d3a;
  margin-top: 30px;

  .container {
    background-color: #e44d3a;

    .footer-left {
      display: flex;
      align-items: center;
      background-color: #e44d3a;

      ul {
        background-color: #e44d3a;
        display: flex;
        list-style: none;
        align-items: center;
        margin: 0;

        li {
          background-color: #e44d3a;
          padding: 15px;
          border-right: 1px solid #fff;

          a {
            color: #fff;
            text-decoration: none;
            text-align: center;
          }
        }
      }
    }
  }
}

@media only screen and (max-width: 600px) {
  .footer-left {
    ul {
      flex-direction: column;
      text-align: center;
      width: 100%;

      li {
        border-right: unset !important;
      }
    }
  }
}
</style>
