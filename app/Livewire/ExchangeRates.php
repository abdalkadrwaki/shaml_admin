<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\ExchangeRate;

class ExchangeRates extends Component
{
    public $exchangeRates, $currency_pair, $name_ar, $buy_rate, $sell_rate, $exchangeRateId;

    // تحديد قواعد التحقق مع استخدام اسم الجدول كاملًا مع الاتصال (user_db.exchange_rates)
    protected $rules = [
        'currency_pair' => 'required|string|unique:user_db.exchange_rates,currency_pair',
        'name_ar'       => 'required|string',
        'buy_rate'      => 'required|numeric',
        'sell_rate'     => 'required|numeric',
    ];

    public function mount()
    {
        // جلب جميع السجلات من جدول exchange_rates في قاعدة user_db
        $this->exchangeRates = ExchangeRate::all();
    }

    public function render()
    {
        return view('livewire.exchange-rates');
    }

    public function store()
    {
        $this->validate();

        // إنشاء سجل جديد في جدول exchange_rates باستخدام الاتصال user_db
        ExchangeRate::create([
            'currency_pair' => $this->currency_pair,
            'name_ar'       => $this->name_ar,
            'buy_rate'      => $this->buy_rate,
            'sell_rate'     => $this->sell_rate,
        ]);

        session()->flash('message', 'تم إضافة العملة بنجاح!');
        $this->resetInputFields();
        $this->mount(); // إعادة تحميل البيانات بعد الإضافة
    }

    public function edit($id)
    {
        $exchangeRate = ExchangeRate::findOrFail($id);
        $this->exchangeRateId = $exchangeRate->id;
        $this->currency_pair = $exchangeRate->currency_pair;
        $this->name_ar       = $exchangeRate->name_ar;
        $this->buy_rate      = $exchangeRate->buy_rate;
        $this->sell_rate     = $exchangeRate->sell_rate;
    }

    public function update()
    {
        $this->validate([
            'currency_pair' => 'required|string|unique:user_db.exchange_rates,currency_pair,' . $this->exchangeRateId,
            'name_ar'       => 'required|string',
            'buy_rate'      => 'required|numeric',
            'sell_rate'     => 'required|numeric',
        ]);

        $exchangeRate = ExchangeRate::findOrFail($this->exchangeRateId);
        $exchangeRate->update([
            'currency_pair' => $this->currency_pair,
            'name_ar'       => $this->name_ar,
            'buy_rate'      => $this->buy_rate,
            'sell_rate'     => $this->sell_rate,
        ]);

        session()->flash('message', 'تم تعديل العملة بنجاح!');
        $this->resetInputFields();
        $this->mount(); // إعادة تحميل البيانات بعد التعديل
    }

    public function delete($id)
    {
        $exchangeRate = ExchangeRate::findOrFail($id);
        $exchangeRate->delete();

        session()->flash('message', 'تم حذف العملة بنجاح!');
        $this->mount(); // إعادة تحميل البيانات بعد الحذف
    }

    public function resetInputFields()
    {
        $this->currency_pair = '';
        $this->name_ar       = '';
        $this->buy_rate      = '';
        $this->sell_rate     = '';
        $this->exchangeRateId = null;
    }
}
