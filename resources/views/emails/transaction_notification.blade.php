<h2>{{ $data['type'] }} Notification</h2>
<p>Hello {{ $data['name'] }},</p>

<p>Your account <strong>{{ $data['a_number'] }}</strong> has been {{ strtolower($data['type']) }}ed.</p>

<ul>
    <li>Amount: {{ $data['currency'] }} {{ number_format($data['amount'], 2) }}</li>
    <li>Description: {{ $data['description'] }}</li>
    <li>Date: {{ $data['date'] }}</li>
    <li>New Balance: {{ $data['currency'] }} {{ number_format($data['balance'], 2) }}</li>
</ul>

<p>Thank you for banking with us.</p>
