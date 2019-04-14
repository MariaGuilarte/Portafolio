<template>
  <div id="listProjects">
    <h1>Todos los proyectos</h1>
    <table class="table" v-if="projects.length">
      <thead>
        <th>Cliente</th>
        <th>Título</th>
        <th>Fecha de inicio</th>
        <th>Fecha de cierre</th>
        <th>Presupuesto</th>
      </thead>
      <tbody>
        <tr v-for="project in projects">
          <td>NO CLIENT NAME</td>
          <td>{{ project.name }}</td>
          <td>{{ project.start_date }}</td>
          <td>{{ project.end_date }}</td>
          <td>{{ project.budget }} USD</td>
        </tr>
      </tbody>
    </table>
    <div v-else class="alert alert-info">No hay proyectos para mostrar</div>
  </div>
</template>

<script>
export default {
  name: 'ListProjects',
  data(){
    return {
      projects: []
    }
  },
  mounted(){
    this.axios.get('api/projects').then((response)=>{
      this.projects = response.data.data
    })
  }
}
</script>

<style>
.table thead th {
    vertical-align: bottom;
    border-top: none;
    border-bottom: 1px solid #dee2e6;
}
</style>
