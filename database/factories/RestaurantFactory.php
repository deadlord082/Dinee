<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Restaurant>
 */
class RestaurantFactory extends Factory
{
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $images = [
            'https://imgs.search.brave.com/dYXQ39DlPl5DKOYF2DPiqtMtP1NcIKaK11zNwSiTId0/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9pbWdz/LnNlYXJjaC5icmF2/ZS5jb20vX2FBUEdl/LVFLVlZMLW9OMnVR/SEx5aEhtWTFibHFq/bW52c0VMMjU1M0FI/cy9yczpmaXQ6NTAw/OjA6MDowL2c6Y2Uv/YUhSMGNITTZMeTl0/WldScC9ZUzVwYzNS/dlkydHdhRzkwL2J5/NWpiMjB2YVdRdk5q/ZzAvTVRVeU1URTRM/Mlp5TDNCby9iM1J2/TDNCcGVucGxjbWxo/L0xYSnZiV1V0YVhS/aGJHbGwvTG1wd1p6/OXpQVFl4TW5nMi9N/VEltZHowd0ptczlN/akFtL1l6MW9SbHBa/V0dJNVNHRnovWHpa/VFpHeElSblJtY0RO/WS9kME4xV0ZCTE5U/UnBPVmxzL09HOVlX/SEZJTkd4alBR',
            'https://imgs.search.brave.com/Niqd-1i9vO2pvpz5ST9U4Z3km8GfeJCUpJNIY6ygWV8/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9pbWdz/LnNlYXJjaC5icmF2/ZS5jb20vbUZMV0lC/UExwdnV0R1huTFI5/Z0Z0QlZRNU90TW5i/V2daYmFkTHZScnFC/VS9yczpmaXQ6NTAw/OjA6MDowL2c6Y2Uv/YUhSMGNITTZMeTl0/WldScC9ZUzVuWlhS/MGVXbHRZV2RsL2N5/NWpiMjB2YVdRdk1U/TXovT0RZek16azVN/eTltY2k5dy9hRzkw/Ynk5bVlTVkRNeVZC/L04yRmtaUzFrZFc0/dGNHVjAvYVhRdGJX/Rm5ZWE5wYmk1cS9j/R2NfY3owMk1USjRO/akV5L0puYzlNQ1py/UFRJd0ptTTkvT0hK/NE0wNWlUMEZ6V0dz/dC9WM1I0TUhVNFgy/MUZiRUpML1JHMDFT/bkZGWW01SU0zUkkv/UmxFNVZGUjRVVDA',
            'https://imgs.search.brave.com/2I6n6Nv0XoKDAZlO0EGLjpyfSHl_jCfqvXtEN8isbQs/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9pbWdz/LnNlYXJjaC5icmF2/ZS5jb20vRkFwNUZy/ZlRrVjdJN0hSbGhV/Z21IbjBmV3dUNDN3/emE5bDh1MUl0Zzdk/MC9yczpmaXQ6NTAw/OjA6MDowL2c6Y2Uv/YUhSMGNITTZMeTl0/WldScC9ZUzVuWlhS/MGVXbHRZV2RsL2N5/NWpiMjB2YVdRdk1U/TXovTnpBNE16STBN/eTltY2k5dy9hRzkw/Ynk5d2JHRnVkR1Y2/L0xYTjFjaTFpWldS/bWIzSmsvTFhOMGNt/VmxkQzBsUXpNbC9R/VEF0WTI5MlpXNTBM/V2RoL2NtUmxiaTFz/YjI1a2NtVnovTG1w/d1p6OXpQVFl4TW5n/Mi9NVEltZHowd0pt/czlNakFtL1l6MW5P/VGxKWlRoaVpEaHkv/TUd0SlJsQTRVVWh0/VUU1MS9Sa3hZVERK/RE1EY3lZMUZRL1Rr/UXdNMk5KU1V4VlBR',
            'https://imgs.search.brave.com/AVmCqph-wavKbF3X_q7ZYDNmAcU7jFWiIbt8-M4fSek/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9pbWdz/LnNlYXJjaC5icmF2/ZS5jb20vMDRMYXdL/cUJ2TkxjXzgzTkRo/amtJZDA0THZwbFZP/UTdHTDVwcGE4MjFz/TS9yczpmaXQ6NTAw/OjA6MDowL2c6Y2Uv/YUhSMGNITTZMeTl0/WldScC9ZUzFqWkc0/dWRISnBjR0ZrL2Rt/bHpiM0l1WTI5dEwy/MWwvWkdsaEwzQm9i/M1J2TFc4di9NR1F2/TmpVdk5UWXZOamd2/L2JHRXRaR1YyWVc1/MGRYSmwvTFdSMUxY/SmxjM1JoZFhKaC9i/blF1YW5Cbg',
            'https://imgs.search.brave.com/bziGQTSxUi1dZ8xcDSkwL8dO9r_iRz37x-x_vMMUfe4/rs:fit:500:0:0:0/g:ce/aHR0cHM6Ly9pbWdz/LnNlYXJjaC5icmF2/ZS5jb20vbDV1RDlV/UVlCRUc2WWhKNnlJ/NmJabUYwRHp4NUlf/eV9aQUo0ODdIRkNa/QS9yczpmaXQ6NTAw/OjA6MDowL2c6Y2Uv/YUhSMGNITTZMeTlq/Wkc0dS9jMmh2Y0ds/bWVTNWpiMjB2L2N5/OW1hV3hsY3k4eEx6/QTMvTXpFdk5EUTVP/Uzh5TURZei9MMlpw/YkdWekx6SmZMVjlR/L2NtOXFaWFJmTkY4/dFgxQnAvWTI5MGFX/NWxYeTFmUkdWMi9Z/VzUwZFhKbFh5MWZS/VzV6L1pXbG5ibVZm/YkdWMGRISmwvYzE5/eVpXeHBaV1pmTFY5/aC9aR2hsYzJsbVgz/WnBkSEp2L2NHaGhi/bWxsWHkxZmRtbDAv/Y21WZmNtVnpkR0Yx/Y21GdS9kRjh0WDFC/dmNuUm1iMnhwL2Ix/OUJZbk52YkhWMFgw/ZHkvWVhCb2FXTmZO/RGd3ZURRNC9NQzVx/Y0djX2RqMHhOekV5/L05UWTNPRE0w.jpeg',
            'https://imgs.search.brave.com/R7Zfpc_htd6HxHDDpGtguAZcQv7z6Oizj21IvbkqUoQ/rs:fit:500:0:0:0/g:ce/aHR0cHM6Ly9pbWdz/LnNlYXJjaC5icmF2/ZS5jb20vU0ZZeDdZ/dVVSMEpaOE9IQWU5/TU4xd24wcFdxU2pz/bVRzTEhVZFdRRE1U/NC9yczpmaXQ6NTAw/OjA6MDowL2c6Y2Uv/YUhSMGNITTZMeTl0/WldScC9ZUzFqWkc0/dWRISnBjR0ZrL2Rt/bHpiM0l1WTI5dEwy/MWwvWkdsaEwzQm9i/M1J2TFc4di9NVEF2/WXpZdk9UZ3ZPREF2/L1pHVjJZVzUwZFhK/bExYSmwvYzNSaGRY/SmhiblF1YW5Cbg.jpeg',
            'https://imgs.search.brave.com/B1LoSHhNKqyJN72FHLjmh2fH554WAiT2t5mmrmX4Olg/rs:fit:500:0:0:0/g:ce/aHR0cHM6Ly9pbWdz/LnNlYXJjaC5icmF2/ZS5jb20vcW1zeUhf/THZEeTFOSG1Ka19i/ZU16OGt3LVZHS1ZZ/SkVQYlBhYXhqTGE0/US9yczpmaXQ6NTAw/OjA6MDowL2c6Y2Uv/YUhSMGNITTZMeTlw/YldjdS9abkpsWlhC/cGF5NWpiMjB2L2NI/TmtMWEJ5WlcxcGRX/MHYvYldGeGRXVjBk/R1V0Wm1Gai9ZV1Js/TFhKbGMzUmhkWEpo/L2JuUmZNek00TmpB/MkxUSTUvTkM1cWNH/Y19jMlZ0ZEQxaC9h/WE5mYUhsaWNtbGs.jpeg',
            'https://imgs.search.brave.com/XvreT97XUoNPaAQDWRPT1zWFSUST0xGao7g5cwJkryk/rs:fit:500:0:0:0/g:ce/aHR0cHM6Ly9pbWdz/LnNlYXJjaC5icmF2/ZS5jb20vZ0dhSVVq/ODBqalp3NXBoNFBs/aUJRMS1NSV80VkVD/V2hjOTRZNjl2NUp5/OC9yczpmaXQ6NTAw/OjA6MDowL2c6Y2Uv/YUhSMGNITTZMeTkx/Y0d4di9ZV1F1ZDJs/cmFXMWxaR2xoL0xt/OXlaeTkzYVd0cGNH/VmsvYVdFdlkyOXRi/Vzl1Y3k4Mi9Mell4/THpJd01peGZjblZs/L1gxTmhhVzUwTFVw/aFkzRjEvWlhNdVNs/Qkg.jpeg',
            'https://imgs.search.brave.com/dIunsPALqarsS97Kqjp4FzS96SqBHD1R7I7xBZaj6pI/rs:fit:500:0:0:0/g:ce/aHR0cHM6Ly9pbWdz/LnNlYXJjaC5icmF2/ZS5jb20vR01vT2Fz/c3V3SjZWeXc5aldm/NEpKUHktUnFfLTJj/VnRYM3JEVUExblVJ/OC9yczpmaXQ6NTAw/OjA6MDowL2c6Y2Uv/YUhSMGNITTZMeTl0/WldScC9ZUzVwYzNS/dlkydHdhRzkwL2J5/NWpiMjB2YVdRdk1U/UXovT1RJeE5EZzRO/QzltY2k5dy9hRzkw/Ynk5aVlYSXRjSEp2/L2NHOXpZVzUwTFdS/bGN5MXovY0NWRE15/VkJPV05wWVd4cC9k/Q1ZETXlWQk9YTXRZ/WEpuL1pXNTBhVzVs/Y3kwbFF6TWwvUVRB/dGRtRnNaVzVqWlMx/bC9jM0JoWjI1bExt/cHdaejl6L1BUWXhN/bmcyTVRJbWR6MHcv/Sm1zOU1qQW1ZejFz/YzNvNC9SR0p4Tmtk/UFluUkxaV1l5L2Ez/WlhRVEZTY3pWMU5F/MUIvUkZnMlh6Qk1W/bFJPWjBwTi9WVlpu/UFE.jpeg',
            'https://imgs.search.brave.com/5nzN5eUf2QmZHMGFrRfCcHdVYpkFk37mIAy5RAjABXg/rs:fit:500:0:0:0/g:ce/aHR0cHM6Ly9pbWdz/LnNlYXJjaC5icmF2/ZS5jb20vSk1uTVhV/NzlEN1JfVzg3T000/ZWNPMTBTQ2J0WG9Q/TjF0MU1Yb3kwNFVs/SS9yczpmaXQ6NTAw/OjA6MDowL2c6Y2Uv/YUhSMGNITTZMeTl0/WldScC9ZUzVwYzNS/dlkydHdhRzkwL2J5/NWpiMjB2YVdRdk1U/STUvTkRFMU1EazBO/UzltY2k5dy9hRzkw/Ynk5bVlXRmtaUzFr/L1pTMWpiMjV6ZEhK/MVkzUnAvYjI0dFpD/VkRNeVZCT1dOdi9j/aVZETXlWQk9XVXRZ/WFpsL1l5MWtaWE10/Y0c5MGN5MWwvZEMx/a1pYTXRkWE5wYm1W/ei9MbXB3Wno5elBU/WXhNbmcyL01USW1k/ejB3Sm1zOU1qQW0v/WXoxdFpteEdUaTF1/VDBadC9VSFJCVUd0/cWVGZHBSMUpSL2Rr/SlJOMnBzVG01YVJH/OUUvVVZVM1h6QjBW/V05aUFE.jpeg',
        ];

        return [
            'name' => fake()->company(),
            'image' => fake()->randomElement($images),
            'localisation' => fake()->numberBetween(100000,9999999999),
            'nb_places' => fake()->numberBetween(1,20),
            'user_id' => fake()->numberBetween(1,10),
        ];
    }
}
