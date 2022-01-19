<?php
namespace Modules\Vendor\Blocks;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Matrix\Exception;
use Modules\Media\Helpers\FileHelper;
use Modules\Template\Blocks\BaseBlock;
use Modules\User\Events\NewVendorRegistered;
use Modules\Vendor\Models\VendorRequest;

class VendorRegisterForm extends BaseBlock
{
    function __construct()
    {
        $this->setOptions([
            'settings' => [
                [
                    'id'        => 'title',
                    'type'      => 'input',
                    'inputType' => 'text',
                    'label'     => __('Title')
                ],
                [
                    'id'        => 'desc',
                    'type'      => 'input',
                    'inputType' => 'text',
                    'label'     => __('Desc')
                ],
                [
                    'id'        => 'youtube',
                    'type'      => 'input',
                    'inputType' => 'text',
                    'label'     => __('Youtube link')
                ],
                [
                    'id'    => 'bg_image',
                    'type'  => 'uploader',
                    'label' => __('Background Image Uploader')
                ],
            ],
            'category'=>__("Other Block")
        ]);
    }

    public function getName()
    {
        return __('Vendor Register Form');
    }

    public function content($model = [])
    {
        $isActiveUser = Auth::id() ? true : false;

        if (!$isActiveUser) {
            return view('Vendor::frontend.blocks.form-register.index', $model);
        }

        // automatic register user become vendor
        $userActive = Auth::user();

        $userActive->business_name = $userActive->first_name . ' ' . $userActive->last_name;
        $userActive->status = 'publish';
        $userActive->save();

        $vendorAutoApproved = setting_item('vendor_auto_approved');
        $dataVendor['role_request'] = setting_item('vendor_role');
        if ($vendorAutoApproved) {
            if ($dataVendor['role_request']) {
                $userActive->assignRole($dataVendor['role_request']);
            }
            $dataVendor['status'] = 'approved';
            $dataVendor['approved_time'] = now();
        } else {
            $dataVendor['status'] = 'pending';
            $userActive->assignRole('customer');
        }

        $vendorExists = VendorRequest::where('user_id', $userActive->id)->first();

        if ($vendorExists) {
            return view('Vendor::frontend.blocks.form-register.exists', $model);
        }

        $vendorRequestData = $userActive->vendorRequest()->save(new VendorRequest($dataVendor));

        try {
            event(new NewVendorRegistered($userActive, $vendorRequestData));
        } catch (\Exception $exception) {
            Log::warning("NewVendorRegistered: " . $exception->getMessage());
        }

        if ($vendorAutoApproved) {
            return view('Vendor::frontend.blocks.form-register.request_success_approved', $model);
        } else {
            return view('Vendor::frontend.blocks.form-register.request_success', $model);
        }
    }

    public function contentAPI($model = []){
        if (!empty($model['bg_image'])) {
            $model['bg_image_url'] = FileHelper::url($model['bg_image'], 'full');
        }
        return $model;
    }
}
