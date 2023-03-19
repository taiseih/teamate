<div
                            class="lg:w-1/3 md:w-1/2 bg-white rounded-lg p-8 flex flex-col md:ml-auto w-full mt-10 md:mt-0 relative z-10 shadow-md mx-auto">
                            <h2 class="text-gray-900 text-lg mb-1 font-medium title-font">出勤情報</h2>
                                <div class="relative mb-4">
                                     <label for="condition" class="leading-7 text-sm text-gray-600">出勤時間</label>
                                     <input type="text" name="text" id="text" value="">
                                </div>
                                {{$at_info->attendance_time}}
                                <div class="relative mb-4">
                                     <label for="condition" class="leading-7 text-sm text-gray-600">体調</label>
                                     <input type="text" name="text" id="text">
                                </div>
                                <button
                                    class="text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg">登録する</button>
                        </div>