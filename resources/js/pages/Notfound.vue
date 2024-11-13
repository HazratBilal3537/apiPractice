<template>
    <div class="not-found-page">
      <div class="content">
        <h1>404</h1>
        <p>Oops! The page you're looking for doesn't exist.</p>
        <span class="emoji">😕</span>
        <router-link to="/dashboard" class="home-button">Go Back Home</router-link>
      </div>
    </div>
  </template>

  <script setup lang="ts">
  import { RouterLink } from 'vue-router';
  </script>

  <style scoped>
  .not-found-page {
    display: flex;
    align-items: center;
    justify-content: center;
    height: 100vh;
    text-align: center;
    color: #333;
    background: #f8f9fa;
  }

  .content {
    max-width: 400px;
  }

  h1 {
    font-size: 8rem;
    margin: 0;
    color: #ff6b6b;
  }

  p {
    font-size: 1.25rem;
    color: #555;
  }

  .emoji {
    font-size: 3rem;
    display: block;
    margin: 1rem 0;
  }

  .home-button {
    display: inline-block;
    margin-top: 1.5rem;
    padding: 0.75rem 1.5rem;
    color: #fff;
    background-color: #007bff;
    border-radius: 0.5rem;
    text-decoration: none;
    font-size: 1rem;
    transition: background-color 0.3s;
  }

  .home-button:hover {
    background-color: #0056b3;
  }
  </style>
