
@if($stateCode == 'wait-for-issue')
    <span class="text-warning">Очікує видачі</span>
@elseif($stateCode == 'in-queue')
    <span class="text-primary">В черзі</span>
@elseif($stateCode == 'issued')
    <span class="text-success">Видана</span>
@elseif($stateCode == 'canceled-by-manager')
    <span class="text-danger">Відмінена бухгалтером</span>
@else
    <span class="text-secondary">Помилка ключа стану</span>
@endif
