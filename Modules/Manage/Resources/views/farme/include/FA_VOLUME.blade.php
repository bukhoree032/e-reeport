
                                        <tr>
                                            <td>
                                                {{ $item+1 }} 
                                            </td>
                                            <td>
                                                {{ $resultID['resultflower'][$item][0]->F_NAME }} 
                                            </td>
                                            <td>
                                                <input type="text" name="FA_VOLUME[{{ $resultID['resultflower'][$item][0]->id }}][PER_TIME][QUANTITY]">
                                                <select name="FA_VOLUME[{{ $resultID['resultflower'][$item][0]->id }}][PER_TIME][UNIT]" id="cars">
                                                    <option value="">หน่วย</option>
                                                    <option value="ช่อ">ช่อ</option>
                                                    <option value="ดอก">ดอก</option>
                                                    <option value="กิโล">กิโล</option>
                                                </select>
                                            </td>
                                            <td>
                                                <input type="text" name="FA_VOLUME[{{ $resultID['resultflower'][$item][0]->id }}][PER_WEEK][QUANTITY]">
                                                <select name="FA_VOLUME[{{ $resultID['resultflower'][$item][0]->id }}][PER_WEEK][UNIT]" id="cars">
                                                    <option value="">หน่วย</option>
                                                    <option value="ช่อ">ช่อ</option>
                                                    <option value="ดอก">ดอก</option>
                                                    <option value="กิโล">กิโล</option>
                                                </select>
                                            </td>
                                            <td>
                                                <input type="text" name="FA_VOLUME[{{ $resultID['resultflower'][$item][0]->id }}][PER_MONTH][QUANTITY]">
                                                <select name="FA_VOLUME[{{ $resultID['resultflower'][$item][0]->id }}][PER_MONTH][UNIT]" id="cars">
                                                    <option value="">หน่วย</option>
                                                    <option value="ช่อ">ช่อ</option>
                                                    <option value="ดอก">ดอก</option>
                                                    <option value="กิโล">กิโล</option>
                                                </select>
                                            </td>
                                        </tr>   