<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Company;

class CompaniesChild extends Component
{
    protected $listeners = [
        'showDeleteForm',
        'showCreateForm',
        'showEditForm',
    ];

    public $item;

    protected $rules = [
        'item.attela_reference' => '',
        'item.created_by' => 'required',
        'item.trading_name' => 'required|min:3',
        'item.registered_as' => '',
        'item.registration_number' => '',
        'item.vat_number' => '',
        'item.contact_name' => 'required',
        'item.contact_number' => 'required',
        'item.email' => 'required',
        'item.physical_address' => 'required',
        'item.postal_address' => 'required',
        'item.domain' => '',
        'item.url_contact_us' => '',
        'item.url_terms_and_conditions' => '',
        'item.url_privacy_policy' => '',
        'item.slogan' => '',
        'item.document_logo' => '',
        'item.website_logo' => '',
    ];

    protected $validationAttributes = [
        'item.attela_reference' => 'AttelaReference',
        'item.created_by' => 'CreatedBy',
        'item.trading_name' => 'TradingName',
        'item.registered_as' => 'RegisteredAs',
        'item.registration_number' => 'RegistrationNumber',
        'item.vat_number' => 'VatNumber',
        'item.contact_name' => 'ContactName',
        'item.contact_number' => 'ContactNumber',
        'item.email' => 'Email',
        'item.physical_address' => 'PhysicalAddress',
        'item.postal_address' => 'PostalAddress',
        'item.domain' => 'Domain',
        'item.url_contact_us' => 'UrlContactUs',
        'item.url_terms_and_conditions' => 'UrlTermsAndConditions',
        'item.url_privacy_policy' => 'UrlPrivacyPolicy',
        'item.slogan' => 'Slogan',
        'item.document_logo' => 'DocumentLogo',
        'item.website_logo' => 'WebsiteLogo',
    ];

    public $confirmingItemDeletion = false;
    public $primaryKey;
    public $confirmingItemCreation = false;
    public $confirmingItemEdition = false;

    public function render()
    {
        return view('livewire.companies-child');
    }

    public function showDeleteForm($id)
    {
        $this->confirmingItemDeletion = true;
        $this->primaryKey = $id;
    }

    public function deleteItem()
    {
        Company::destroy($this->primaryKey);
        $this->confirmingItemDeletion = false;
        $this->primaryKey = '';
        $this->reset(['item']);
        $this->emitTo('companies', 'refresh');
    }
 
    public function showCreateForm()
    {
        $this->confirmingItemCreation = true;
        $this->resetErrorBag();
        $this->reset(['item']);
    }

    public function createItem() 
    {
        $this->validate();
        Company::create([
            'attela_reference' => $this->item['attela_reference'], 
            'created_by' => $this->item['created_by'], 
            'trading_name' => $this->item['trading_name'], 
            'registered_as' => $this->item['registered_as'], 
            'registration_number' => $this->item['registration_number'], 
            'vat_number' => $this->item['vat_number'], 
            'contact_name' => $this->item['contact_name'], 
            'contact_number' => $this->item['contact_number'], 
            'email' => $this->item['email'], 
            'physical_address' => $this->item['physical_address'], 
            'postal_address' => $this->item['postal_address'], 
            'domain' => $this->item['domain'], 
            'url_contact_us' => $this->item['url_contact_us'], 
            'url_terms_and_conditions' => $this->item['url_terms_and_conditions'], 
            'url_privacy_policy' => $this->item['url_privacy_policy'], 
            'slogan' => $this->item['slogan'], 
            'document_logo' => $this->item['document_logo'], 
            'website_logo' => $this->item['website_logo'], 
        ]);
        $this->confirmingItemCreation = false;
        $this->emitTo('companies', 'refresh');
    }
 
    public function showEditForm(Company $item)
    {
        $this->resetErrorBag();
        $this->item = $item;
        $this->confirmingItemEdition = true;
    }

    public function editItem() 
    {
        $this->validate();
        $this->item->save();
        $this->confirmingItemEdition = false;
        $this->primaryKey = '';
        $this->emitTo('companies', 'refresh');
    }

}
