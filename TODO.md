# demo-app - Roadmap Execution Notes

## Step 1 (Approved): Add proper CRUD baseline (non-Livewire)
- [x] Update routes/web.php with CRUD routes for Todo
- [x] Expand TodoController with create/store/edit/update/destroy
- [x] Add validation for title + deadline + completed
- [x] Create Blade views for create + edit forms (Bootstrap)
- [x] Update index.blade.php to wire Add/Edit/Delete actions (forms/buttons with correct URLs)
- [x] Ensure delete uses POST + method spoofing + CSRF
- [ ] Run migrations + seeders and verify UI manually
- [ ] Run phpunit (existing tests) to ensure nothing breaks


