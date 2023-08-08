<div class="mb-7">

    <div class="mb-3">
        <h3>Подписаться</h3>
    </div>
    <!-- Form -->
    <form  action="{{ route('subscribe.create') }}" method="post">
        @csrf
        <div class="mb-2">
            <input type="email" name="email" class="form-control" placeholder="Введите email" aria-label="Введите email" required>
        </div>
        <div class="d-grid">
            <button type="submit" class="btn btn-primary">Подписаться</button>
        </div>
    </form>
    <!-- End Form -->
    <p class="form-text">Получение ежедневной рассылки о новых документах и вступлении их в силу.</p>
</div>
