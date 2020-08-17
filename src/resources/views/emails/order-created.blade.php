@component('mail::message')
# Вітаємо!

Ви успішно створили замовлення на видачу довідки про {{ $order->type->name }}.<br>
Переглянути стан замовлення Ви завжди можете на сторінці свого профілю.


@component('mail::button', ['url' => route('order.show', $order->id)])
Переглянути замовлення
@endcomponent

Дякуємо,<br>
{{ config('app.name') }}
@endcomponent
