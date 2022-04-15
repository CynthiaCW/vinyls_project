<template>
  <nav class="navbar">
    <ul>
      <img class="navbar-brand" src height="100px" />
      <!-- todo src -->

      <li class="nav-item active">
        <router-link to="/">Home</router-link>
      </li>

      <li class="nav-item active">
        <router-link to="admin">Admin</router-link>
      </li>

      <li class="nav-item active">
        <router-link to="/vinyls">Nos vinyls</router-link>
      </li>
    </ul>
  </nav>
</template>

<script>

export default{
  name:'NavBar'
}

</script>

<style scoped>
@import url('https://fonts.googleapis.com/css?family=Muli&display=swap');

.navbar {
  display: flex;
  justify-content: center;
  text-align: center;
  background-color: rgb(34, 34, 34);
  margin: 15px;
  height: 95%;
  width: 400px;
  position: fixed; /* Fixed Sidebar (stay in place on scroll) */
  z-index: 1; /* Stay on top */
  top: 0; /* Stay at the top */
  left: 0;
  padding-top: 20px;
  border-radius: 25px;
  box-shadow: rgba(105, 102, 252, 0.842) 2px 3px 8px;
}

.navbar:hover {
  border: 2px #7b6ded;;
}

ul {
  padding: 0;
  align-content: center;
}

ul > li {
  text-decoration: none;
  list-style-type: none;
  padding-bottom: 80px;
  display: block;
}
ul > li > a {
  text-decoration: none;
  font-family: 'Muli', sans-serif;
  font-weight: 600;
  font-size: 1.5rem;
  color: white;
}

ul > li > a:hover {
  color: #7b6ded;
}
</style>
