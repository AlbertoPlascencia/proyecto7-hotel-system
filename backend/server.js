console.log("Sistema hotelero iniciado");

let rooms = [
 {id:1, number:101, type:"Sencilla", price:900, status:"Disponible"},
 {id:2, number:102, type:"Doble", price:1200, status:"Disponible"},
 {id:3, number:103, type:"Suite", price:2000, status:"Disponible"}
];

let reservations = [];

function showRooms(){

 console.log("\nHabitaciones disponibles:");

 rooms.forEach(room => {

   console.log(
     "Habitación " + room.number +
     " | Tipo: " + room.type +
     " | Estado: " + room.status
   );

 });

}


// Crear reservación
function createReservation(client, roomNumber, checkin, checkout){

 let room = rooms.find(r => r.number === roomNumber);

 if(!room){
   console.log("Error: habitación no encontrada");
   return;
 }

 if(room.status !== "Disponible"){
   console.log("Error: la habitación ya está ocupada");
   return;
 }

 let reservation = {
   client,
   roomNumber,
   checkin,
   checkout
 };

 reservations.push(reservation);

 room.status = "Ocupada";

 console.log("Reservación creada correctamente para:", client);

}


// Mostrar reservaciones
function showReservations(){

 console.log("\nReservaciones registradas:");

 if(reservations.length === 0){
   console.log("No hay reservaciones todavía");
   return;
 }

 reservations.forEach(r => {

   console.log(
     "Cliente: " + r.client +
     " | Habitación: " + r.roomNumber +
     " | Entrada: " + r.checkin +
     " | Salida: " + r.checkout
   );

 });

}


// Simulación del sistema

showRooms();

createReservation("Juan Perez",101,"2026-03-10","2026-03-12");

createReservation("Maria Lopez",101,"2026-03-15","2026-03-18");

showReservations();

showRooms();
