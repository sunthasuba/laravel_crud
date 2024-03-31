<!-- resources/js/Pages/Students/Show.vue -->

<template>
    <div>
      <h1>{{ student.name }}</h1>
      <!-- Display other student details here -->
    </div>
  </template>
  
  <script>
  export default {
    props: {
      student: Object,
    },
  };
  </script>
  