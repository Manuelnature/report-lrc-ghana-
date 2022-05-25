const confirmed_orders = document.getElementById('confirmed-orders');
const cancelled_orders = document.getElementById('cancelled-orders');

const table_container = document.getElementById('table-container');

const all_orders_table = document.getElementById('all_orders_table');

const confirmed_orders_table = document.getElementById('confirmed_orders_table');

window.addEventListener('DOMContentLoaded', function(){
  table_container.innerHTML = "";
  console.log('Heeyyy');
});

// function initial_load(){
// 	return table_container.innerHTML = all_orders_table;
// }

confirmed_orders.addEventListener('click', function(){
	table_container.innerHTML = confirmed_orders_table;
	console.log('Yoooou');
})