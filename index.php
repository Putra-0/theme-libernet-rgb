<?php
    include('auth.php');
    check_session();
?>
<!doctype html>
<html lang="en">
<head>
    <?php
        $title = "Home";
        include("head.php");
    ?>
</head>
<body>
<div id="app">
    
    <div class="container">
        <div class="row py-2">
            <div class="col-lg-8 col-md-12 mx-auto mx-auto" style="margin-top:20px">
                <div class="card block moving-glow">
		<?php include('navbar.php'); ?>
                    <div class="card-header">
                        <div class="text-center nganu slide">
                            <h3><i class="fa fa-home"></i> Home</h3>
                        </div>
                        <hr>
                        <form @submit.prevent="runLibernet">
                            <div class="form-group form-row my-auto">
                                <div class="col-lg-5 col-md-5 form-row mx-auto py-1">
                                    <div class="col-lg-3 col-md-3 my-auto">
                                        <label class="my-auto">Mode</label>
                                    </div>
                                    <div class="col">
                                        <select style="color:red;background-color:rgba(0,0,0,0)" class="form-control" v-model.number="config.mode" :disabled="status === true" required>
                                            <option v-for="mode in config.temp.modes" :value="mode.value">{{ mode.name }}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-5 col-md-4 form-row mx-auto py-1">
                                    <div class="col-lg-3 col-md-3 my-auto">
                                        <label class="my-auto">Config</label>
                                    </div>
                                    <div class="col">
                                        <select style="color:red;background-color:rgba(0,0,0,0)" class="form-control" v-model="config.profile" :disabled="status === true" required>
                                            <option v-for="profile in config.profiles" :value="profile">{{ profile }}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col form-row py-1">
                                    <div class="col mx-auto">
                                        <button type="submit" class="btn" :class="{ 'btn-outline-danger': status, 'btn-outline-primary': !status }">{{ statusText }}</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card-body">
                        <div class="card-body py-0 px-0">
                            <div class="row">
                                <div v-if="config.mode !== 5" class="col-lg-6 col-md-6 pb-lg-1">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" v-model="config.system.tun2socks.legacy" :disabled="status === true" id="tun2socks-legacy">
                                        <label class="form-check-label" for="tun2socks-legacy">
                                            Use tun2socks legacy
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 pb-lg-1">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" v-model="config.system.tunnel.autostart" :disabled="status === true" id="autostart">
                                        <label class="form-check-label" for="autostart">
                                            Auto start Libernet on boot
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 pb-lg-1">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" v-model="config.system.tunnel.dns_resolver" :disabled="status === true" id="dns-resolver">
                                        <label class="form-check-label" for="dns-resolver">
                                            DNS resolver
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 pb-lg-1">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" v-model="config.system.system.memory_cleaner" :disabled="status === true" id="memory-cleaner">
                                        <label class="form-check-label" for="memory-cleaner">
                                            Memory cleaner
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-12 pb-lg-1">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" v-model="config.system.tunnel.ping_loop" :disabled="status === true" id="ping-loop">
                                        <label class="form-check-label" for="ping-loop">
                                            PING loop
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <span style="color:#fff">Status: </span><span :class="{ 'text-secondary': connection === 0, 'text-warning': connection === 1, 'text-success': connection === 2, 'text-info': connection === 3 }">{{ connectionText }}</span>
                                    <span v-if="connection === 2" class="text-secondary">{{ connectedTime }}</span>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <span style="color:#fff">IP:</span><span class="text-success"> {{ wan_ip }}</span>
                                </div>
				<div v-if="connection === 2" class="col-lg-6 col-md-6">
                                    <span style="color:#fff">TX | RX: </span><span class="text-success">{{ total_data.tx }} | {{ total_data.rx }}</span>
                                </div>
				<div class="col-lg-6 col-md-6">
                                    <span style="color:#fff">ISP:</span><span class="text-success"> {{wan_net}} {{ wan_country }}</span>
                                </div>
                                <div class="col-lg-9 pt-2 mx-auto">
                                    <pre ref="log" v-html="log" class="form-control text-left" style="height: 16rem; background-color: rgba(0,0,0,0); font-size:13px; font-family:courier-new; color:#9D9D9D"></pre>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include('footer.php'); ?>
    </div>
</div>
<?php include("javascript.php"); ?>
<script src="js/index.js"></script>
</body>
</html>