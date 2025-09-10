<?php

namespace App\Domains\Imputation\Models;

use App\Models\Service;
use Illuminate\Database\Eloquent\Model;
use Database\Factories\ImputationFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Creagia\LaravelSignPad\Concerns\RequiresSignature;
use Creagia\LaravelSignPad\Contracts\CanBeSigned;
use Creagia\LaravelSignPad\Contracts\ShouldGenerateSignatureDocument;
use Creagia\LaravelSignPad\Templates\BladeDocumentTemplate;
use Creagia\LaravelSignPad\Templates\PdfDocumentTemplate;
use Creagia\LaravelSignPad\SignatureDocumentTemplate;
use Creagia\LaravelSignPad\SignaturePosition;



class Imputation extends Model
{
    use HasFactory;
    use RequiresSignature;

    protected $appends = ['agent'];

    protected $fillable = ['sick_name', 'first_name', 'last_name',
                            'email', 'phone', 'cni', 'registration_number',
                            'service_id', 'fonction', 'file', 'status', 'validation'];

    public const LOAD_EMPLOYE = 0.2;
    public const LOAD_EMPLOYER = 0.8;

    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        static::creating(function ($imputation) {
            $imputation->phone =  (int) (221 . $imputation->phone);
        });
    }

    public function getAgentAttribute() : String
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    /**
     * Scope a query to only include active users.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return void
     */
    public function scopeActive($query)
    {
        $query->where('validation', 1);
    }

     /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        return ImputationFactory::new();
    }


    public function service()
    {
        return $this->belongsTo(service::class, 'service_id');
    }


    public function getSignatureDocumentTemplate(): SignatureDocumentTemplate
    {
        return new SignatureDocumentTemplate(
            outputPdfPrefix: 'document', // optional
            // template: new BladeDocumentTemplate('pdf/my-pdf-blade-template'), // Uncomment for Blade template
            // template: new PdfDocumentTemplate(storage_path('pdf/template.pdf')), // Uncomment for PDF template
            signaturePositions: [
                 new SignaturePosition(
                     signaturePage: 1,
                     signatureX: 20,
                     signatureY: 25,
                 ),
                 new SignaturePosition(
                     signaturePage: 2,
                     signatureX: 25,
                     signatureY: 50,
                 ),
            ]               
        );
    }
}
