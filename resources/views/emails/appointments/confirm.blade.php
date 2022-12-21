<x-mail::message>

# Cita confirmada

Tu cita ha sido confirmada!

Servicio de **{{ $serviceName }}** para el cliente **{{ $customerName }}** con el esteticista **{{ $beauticianName }}** {{ $date }}

<x-mail::table>
| Id | Servicio | Descripción | Precio |
|--------------------|-----------------|------------------------|-----------|
| {{$appointmentId}} | {{$serviceName}} | {{$serviceDescription}} | {{$price}} |

</x-mail::table>

<x-mail::button :url="$confirmationUrl">
Presionar para confirmar cita
</x-mail::button>

Gracias,<br>
{{ config('app.name') }}
</x-mail::message>
