<template>
    <div>
      <h1>Students List</h1>
      <ul>
        <li v-for="student in students" :key="student.id">
          <p>{{ student.name }}</p>
          <p>Age: {{ student.age }}</p>
          <p>Status: {{ student.status }}</p>
          <router-link :to="{ name: 'students.edit', params: { id: student.id }}">Edit</router-link>
          <button @click="deleteStudent(student.id)">Delete</button>
        </li>
      </ul>
      <router-link :to="{ name: 'students.create' }">Add New Student</router-link>
    </div>
  </template>
  
  <script>
  import { ref } from 'vue';
  import { usePage } from '@inertiajs/inertia-vue3';
  
  export default {
    setup() {
      const { data: { students } } = usePage().props.value;
  
      const deleteStudent = async (id) => {
        if (confirm('Are you sure you want to delete this student?')) {
          await this.$inertia.delete(route('students.destroy', { student: id }));
        }
      };
  
      return { students, deleteStudent };
    },
  };
  </script>
  