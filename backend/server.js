console.log("Sistema hotelero iniciado");

let rooms = [
 {id:1, number:101, type:"Sencilla", price:900, status:"Disponible"},
 {id:2, number:102, type:"Doble", price:1200, status:"Disponible"},
 {id:3, number:103, type:"Suite", price:2000, status:"Disponible"}
];

let reservations = [];

function showRooms(){
 console.log("Habitaciones disponibles:");
 rooms.forEach(r => console.log(r.number + " - " + r.status));
}

function createReservation(client, roomNumber, checkin, checkout){

 let room = rooms.find(r => r.number === roomNumber);

 if(!room){
   console.log("Habitación no encontrada");
   return;
 }

 if(room.status !== "Disponible"){
   console.log("Habitación no disponible");
   return;
 }

 room.status = "Ocupada";

 reservations.push({
   client,
   roomNumber,
   checkin,
   checkout
 });

 console.log("Reservación creada para", client);
}

showRooms();

createReservation("Juan Perez",101,"2026-03-10","2026-03-12");

console.log("Reservaciones actuales:");
console.log(reservations);
