@component('mail::message')
# Booking Confirmation

Dear {{ $booking->user->name }},

Thank you for booking with us. Here are your booking details:

- **Hotel:** {{ $booking->hotel->name }}
- **Location:** {{ $booking->hotel->location }}
- **Check-In:** {{ $booking->check_in }}
- **Check-Out:** {{ $booking->check_out }}
- **Guests:** {{ $booking->guests }}

We look forward to hosting you!

Thanks,<br>
{{ config('app.name') }}
@endcomponent
