<template>
  <div id="listProjects">
    <h1>Todos los proyectos</h1>
    <table class="table">
      <thead>
        <th>Cliente</th>
        <th>Título</th>
        <th>Fecha de inicio</th>
        <th>Fecha de cierre</th>
        <th>plataforma</th>
      </thead>
      <tbody></tbody>
    </table>
  </div>
</template>

<script>
export default {
  name: 'ListProjects'
}
</script>

<style>
.table thead th {
    vertical-align: bottom;
    border-top: none;
    border-bottom: 1px solid #dee2e6;
}
</style>
