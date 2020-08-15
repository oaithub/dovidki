@component('mail::message')
# Оновлення статусу замовлення #{{ $order->id }}

Статус вашого замовлення на видачу довідки про {{ $order->type }} оновлено на "{{ $order->state->name }}".<br>
Переглянути деталі замовлення Ви можете на сторінці свого профілю.


@component('mail::button', ['url' => route('order.show', $order->id)])
    Переглянути замовлення
@endcomponent

Дякуємо,<br>
{{ config('app.name') }}
@endcomponent
